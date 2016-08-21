requirejs.config({
    paths: {
        "text": "http://cdnjs.cloudflare.com/ajax/libs/require-text/2.0.12/text"
    }
});

require(['knockout-3.4.0', 'knockout-file-bind'], function(ko, fileBind) {
    function Item(id, title, description, dimensions, content){
        this.id = ko.observable(id);
        this.title = ko.observable(title);
        this.description = ko.observable(description);
        this.dimensions = ko.observable(dimensions);
        this.content = ko.observable(content);
    }

    var ListViewModel = function () {
        var self = this;
        window.viewModel = self;

        self.fileInput = ko.observable();
        self.someReader =  new FileReader();


        self.saveMode = ko.observable("pictura");

        self.list = ko.observableArray([]);

        $.get(self.getUrl, {action : "list"}).complete(function (result) {
            self.list(result);
        });

        self.pageSize = ko.observable(10);
        self.pageIndex = ko.observable(0);
        self.selectedItem = ko.observable();
        
        self.saveUrl = 'api.php';
        self.deleteUrl = 'api.php';
        self.getUrl = 'api.php';

        self.edit = function (item) {
            self.selectedItem(item);
        };

        self.cancel = function () {
            self.selectedItem(null);
        };

        self.add = function () {
            var newItem = new Item();
            self.list.push(newItem);
            self.selectedItem(newItem);
            self.moveToPage(self.maxPageIndex());
        };
        self.remove = function (item) {
            if (item.id()) {
                if (confirm('Are you sure you wish to delete this item?')) {

                    $.post(self.deleteUrl, {action : "delete", image_id: item.id}).complete(function (result) {
                        self.list.remove(item);
                        if (self.pageIndex() > self.maxPageIndex()) {
                            self.moveToPage(self.maxPageIndex());
                        }
                    });
                }
            }
            else {
                self.list.remove(item);
                if (self.pageIndex() > self.maxPageIndex()) {
                    self.moveToPage(self.maxPageIndex());
                }
            }
        };
        self.save = function () {
            var item = self.selectedItem();

            $.post(self.saveUrl,  {'action' : "save", 'file' : self.fileInput}, function (result) {
                self.selectedItem().id(result);
                self.selectedItem(null);
            });

        };

        self.templateToUse = function (item) {
            return self.selectedItem() === item ? 'editTmpl' : 'itemsTmpl';
        };

        self.pagedList = ko.dependentObservable(function () {
            var size = self.pageSize();
            var start = self.pageIndex() * size;
            return self.list.slice(start, start + size);
        });
        self.maxPageIndex = ko.dependentObservable(function () {
            return Math.ceil(self.list().length / self.pageSize()) - 1;
        });
        self.previousPage = function () {
            if (self.pageIndex() > 0) {
                self.pageIndex(self.pageIndex() - 1);
            }
        };
        self.nextPage = function () {
            if (self.pageIndex() < self.maxPageIndex()) {
                self.pageIndex(self.pageIndex() + 1);
            }
        };
        self.allPages = ko.dependentObservable(function () {
            var pages = [];
            for (i = 0; i <= self.maxPageIndex() ; i++) {
                pages.push({ pageNumber: (i + 1) });
            }
            return pages;
        });
        self.moveToPage = function (index) {
            self.pageIndex(index);
        };
    };

    var initialData = [new Item('WA', 'Washington', 'WA', 'bla'), new Item('AK', 'Alaska', 'AK', 'bla')];
    ko.applyBindings(new ListViewModel(initialData));
});
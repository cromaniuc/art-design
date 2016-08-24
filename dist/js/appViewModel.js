// Main viewmodel class
define(['knockout-3.4.0',
    'template!app/pictura.html!pictura',
    'template!app/design.html!design',
    'template!app/contact.html!contact',
    'template!app/despreArtist.html!despreArtist',
    'template!app/header/design-header.html!design-header',
    'template!app/header/pictura-header.html!pictura-header'], function(ko) {
    return function appViewModel() {

        var self = this;

        self.selectedView = ko.observable("despreArtist")

        self.picturi = ko.observableArray([])
        self.designImages = ko.observableArray([])

        self.getUrl = 'api.php'


        $.ajax({
                url: self.getUrl,
                type: 'get',
                dataType: 'json',
                success: function (result) {
                    self.picturi(result);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                     alert(errorThrown);
                },
                data: {'action' : "list", 'isPictura': true}
            });


            $.ajax({
                url: self.getUrl,
                type: 'get',
                dataType: 'json',
                success: function (result) {
                    self.designImages(result);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                     alert(errorThrown);
                },
                data: {'action' : "list", 'isPictura': false}
            });


        self.isQuoteVisible = function(){
            return self.selectedView() === 'despreArtist' || self.selectedView() === 'contact'
        }

        self.currentHeader = ko.observable("pictura-header")
        self.selectView = function(templateName){
            self.selectedView(templateName);
            if(templateName === 'design'){
                self.currentHeader('design-header')
            }else{
                self.currentHeader('pictura-header')
            }
        }   
    };
});
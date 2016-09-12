requirejs.config({
    paths: {
        "text": "http://cdnjs.cloudflare.com/ajax/libs/require-text/2.0.12/text"
    }
});

require(['knockout-3.4.0', 'appViewModel'], function (ko, appViewModel) {
    ko.applyBindings(new appViewModel());
});
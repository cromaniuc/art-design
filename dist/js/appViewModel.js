// Main viewmodel class
define(['knockout-3.4.0',
    'template!app/pictura.html!pictura',
    'template!app/design.html!design',
    'template!app/contact.html!contact',
    'template!app/despreArtist.html!despreArtist',
    'template!app/header/design-header.html!design-header',
    'template!app/header/pictura-header.html!pictura-header'], function(ko) {
    return function appViewModel() {


        this.selectedView = ko.observable("despreArtist")

        this.picturi = [{titlu: 'abc', descriere: "bla"}, {titlu: 'abc1', descriere: "bla2"}]

        this.isQuoteVisible = function(){
            return this.selectedView() === 'despreArtist' || this.selectedView() === 'contact'
        }

        this.currentHeader = ko.observable("pictura-header")
        this.selectView = function(templateName){
            this.selectedView(templateName);
            if(templateName === 'design'){
                this.currentHeader('design-header')
            }else{
                this.currentHeader('pictura-header')
            }
        }   
    };
});
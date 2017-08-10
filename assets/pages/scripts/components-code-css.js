var ComponentsCodeEditors = function () {
   
    var handleDemo = function () {
        var myTextArea = document.getElementById('code_editor');
        var myCodeMirror = CodeMirror.fromTextArea(myTextArea, {
            lineNumbers: true,
            matchBrackets: true,
            styleActiveLine: true,
            theme:"material",
            mode: 'css',
            readOnly: false
        });
    }


    return {
        //main function to initiate the module
        init: function () {
            handleDemo();
        }
    };

}();

jQuery(document).ready(function() {    
   ComponentsCodeEditors.init(); 
});
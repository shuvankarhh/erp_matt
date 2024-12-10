
    var DropdownButton = function(context) {
    var ui = $.summernote.ui;

    // create button
    var buttonGroup = ui.buttonGroup([
        ui.button({
            className: "dropdown-toggle",
            contents: 'Variables <span class="note-icon-caret"></span>',
            tooltip: "User Variables",
            data: {
                toggle: "dropdown",
            },
            click: function() {
                // Cursor position must be saved because is lost when dropdown is opened.
                context.invoke("editor.saveRange");
            },
        }),
        ui.dropdown({
            className: "dropdown-style",
            contents: "<ol class='dropdown-content'><li class='dropdown_value' >Employee Name</li><li  class='dropdown_value' >Designation</li>   <li  class='dropdown_value'>Company Name</li><li  class='dropdown_value'>Today Date</li></ol>",
            callback: function($dropdown) {
                $dropdown.find("li").each(function() {
                    $(this).click(function(e) {
                        // We restore cursor position and text is inserted in correct pos.
                        context.invoke("editor.restoreRange");
                        context.invoke("editor.focus");
                        context.invoke(
                            "editor.insertText",
                            "{"+"{" +
                            $(this)
                            .html()
                            .replace(/ /g, "_")+
                            "}}"
                        );
                        e.preventDefault();
                    });
                });
            },
        }),
    ]);
    return buttonGroup.render(); // return button as jquery object
    };
        $(document).ready(function() {
            $('#mySummernote').summernote({
                height: 250,
                toolbar: [
                    ['undo', ['undo']],
                    ['redo', ['redo']],
                    ['fontname', ['fontname']],
                    ['style', ['style']],
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['height', ['height']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['picture', ['picture']],
                    ['insert', ['customButton']],
                    ["eventButton", ["event"]],
                ],
                fontSizes: ['8', '9', '10', '11', '12', '14', '16', '18', '20', '24','28','32','34','38','42','48','52'],
                buttons: {
                    event: DropdownButton,
                },
            });   
        });
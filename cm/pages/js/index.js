$(function() {
    // Define data source for At.JS.
    var datasource = ["Jacob", "Isabella", "Ethan", "Emma", "Michael", "Olivia" ];

    // Build data to be used in At.JS config.
    var names = $.map(datasource, function (value, i) {
      return {
        'id': i, 'name': value, 'email': value + "@email.com"
      };
    });

    // Define config for At.JS.
    var config = {
      at: "@",
      data: names,
      displayTpl: '<li>${name} <small>${email}</small></li>',
      limit: 200
    }

    // Initialize editor.
    $('#froala-editor')
      .on('froalaEditor.initialized', function (e, editor) {
        editor.$el
          .atwho(config)
          .on('inserted.atwho', function () {
            editor.$el.find('.atwho-inserted').removeAttr('contenteditable');
          })

      	editor.events.on('keydown', function (e) {
          if (e.which == $.FroalaEditor.KEYCODE.ENTER && editor.$el.atwho('isSelecting')) {
            return false;
          }
        }, true);
      })
      .froalaEditor()
  });
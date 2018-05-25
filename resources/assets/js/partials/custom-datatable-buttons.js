(function ($, DataTable) {
    "use strict";

    DataTable.ext.buttons.clean = {
        className: 'buttons-clean',

        text: function (dt) {
            return '<i class="fa fa-eraser"></i> ' + dt.i18n('buttons.clean', 'Clean');
        },

        action: function (e, dt, button, config) {
            $('input').not('[type=submit]').not('[type=reset]').val('');
            $('.select').val('').trigger('change');
            dt.draw();
        }
    };

    DataTable.ext.buttons.separator = {
        className: 'buttons-separator',

        text: function (dt) {
            return '<i class="separator"></i> ' + dt.i18n('buttons.separator', '');
        },

    };
})(jQuery, jQuery.fn.dataTable);
(function ($) {

    $.fn.pickList = function (options) {

        var opts = $.extend({}, $.fn.pickList.defaults, options);

        this.fill = function () {
            var option = '';

            $.each(opts.data, function (key, val) {
                option += '<option id=' + val.id + '>' + val.text + '</option>';
            });
            this.find('#pickData').append(option);
        };
        this.controll = function () {
            var pickThis = this;

            $("#pAdd").on('click', function () {
                var p = pickThis.find("#pickData option:selected");
                p.clone().appendTo("#pickListResult");
                p.remove();
            });

            $("#pAddAll").on('click', function () {
                var p = pickThis.find("#pickData option");
                p.clone().appendTo("#pickListResult");
                p.remove();
            });

            $("#pRemove").on('click', function () {
                var p = pickThis.find("#pickListResult option:selected");
                p.clone().appendTo("#pickData");
                p.remove();
            });

            $("#pRemoveAll").on('click', function () {
                var p = pickThis.find("#pickListResult option");
                p.clone().appendTo("#pickData");
                p.remove();
            });
        };
        this.getValues = function () {
            var objResult = [];
            this.find("#pickListResult option").each(function () {
                objResult.push({id: this.id, text: this.text});
            });
            return objResult;
        };
        this.init = function () {
            var pickListHtml =
                "<div class='row-fluid'>" +
                "  <div class='span4'>" +
                "	 <select class='form-control pickListSelect span12' id='pickData' multiple></select>" +
                " </div>" +
                " <div class='span2 pickListButtons'>" +
                "	<button id='pAdd' class='btn btn-primary btn-sm'>" + opts.add + "</button>" +
                "   <button id='pAddAll' class='btn btn-primary btn-sm'>" + opts.addAll + "</button>" +
                "	<button id='pRemove' class='btn btn-primary btn-sm'>" + opts.remove + "</button>" +
                "	<button id='pRemoveAll' class='btn btn-primary btn-sm'>" + opts.removeAll + "</button>" +
                " </div>" +
                " <div class='span4'>" +
                "    <select class='form-control pickListSelect span12' id='pickListResult' multiple></select>" +
                " </div>" +
                "</div>";

            this.append(pickListHtml);

            this.fill();
            this.controll();
        };

        this.init();
        return this;
    };

    $.fn.pickList.defaults = {
        add: '添加',
        addAll: '添加全部',
        remove: '移除',
        removeAll: '移除全部'
    };


}(jQuery));


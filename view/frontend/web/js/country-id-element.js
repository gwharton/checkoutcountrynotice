define([
    'Magento_Ui/js/form/element/select',
], function (
    Select,
) {
    'use strict';

    return Select.extend({
        defaults: {
            defaultNotice: '',
            countryGroups: [],
            storeId: 0
        },

        initialize: function (options) {
            this._super(options);
            this.onUpdate(options.value);
            return this;
        },

        onUpdate: function (value) {
            let noticeText = this.defaultNotice;
            let countryGroups = this.countryGroups;
            this._super();
            Object.keys(this.countryGroups).forEach( function(groupId) {
                if (countryGroups[groupId]['countrylist'].includes(value)) {
                    noticeText = countryGroups[groupId]['notice']
                }
            }, this.countryGroups);
            this.notice(noticeText);
        },
    });
});

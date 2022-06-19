define([
    'Magento_Ui/js/form/element/select',
    'ko'
], function (
    Select,
    ko
) {
    'use strict';

    return Select.extend({
        defaults: {
            defaultTooltip: '',
            countryGroups: [],
            storeId: 0,
            tooltip: ko.observable(false)
        },

        initObservable: function () {
            this._super();
            this.observe('tooltip');
            return this;
        },

        initialize: function (options) {
            this._super(options);
            this.initObservable();
            this.onUpdate(options.value);
            return this;
        },

        onUpdate: function (value) {
            let tooltipText = this.defaultTooltip;
            let countryGroups = this.countryGroups;
            this._super();
            Object.keys(this.countryGroups).forEach( function(groupId) {
                if (countryGroups[groupId]['countrylist'].includes(value)) {
                    tooltipText = countryGroups[groupId]['notice']
                }
            }, this.countryGroups);
            this.tooltip(tooltipText);
        },
    });
});

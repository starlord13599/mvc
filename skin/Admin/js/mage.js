const Base = function () {

};

Base.prototype = {


    url: null,
    params: {},
    method: 'GET',

    // typeof yourVariable === 'object' && yourVariable !== null
    getUrl: function () {
        return this.url
    },

    setUrl: function (url) {
        this.url = url
        return this
    },

    getMethod: function () {
        return this.method
    },

    setMethod: function (method) {
        this.method = method
        return this
    },

    setParams: function (params) {
        this.params = params
        return this
    },

    getParams: function (key = null) {
        if (!key) {
            return this.params
        }
        if (!(this.params[key] == 'undefined')) {
            return this.params[key]
        }
        return null

    },

    addParam: function (key, value) {
        this.params[key] = value
    },

    resetParam: function () {
        this.params = {}
        return this
    },

    removeParam: function (key) {

        if (!(this.params[key] == 'undefined')) {
            delete this.params[key]
        }
        return this
    },

    load: function () {
        jQuery.ajax({
            method: this.getMethod(),
            url: this.getUrl(),
            data: this.getParams(),
            success: function (response) {
                $(response.element).each(function (i, element) {
                    $(element.selector).html(element.htmlcontent)
                })

            }
        })
    }

}

const mage = new Base();
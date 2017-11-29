(function() {

    var __hs_cta_json = {"css":"a#cta_button_2198284_55a87f18-cebf-4f58-a23b-9af4dc53fbc9 {\n  cursor:pointer; \n}\na#cta_button_2198284_55a87f18-cebf-4f58-a23b-9af4dc53fbc9:hover {\n}\na#cta_button_2198284_55a87f18-cebf-4f58-a23b-9af4dc53fbc9:active, #cta_button_2198284_55a87f18-cebf-4f58-a23b-9af4dc53fbc9:active:hover {\n}\n\na#cta_button_2198284_55a87f18-cebf-4f58-a23b-9af4dc53fbc9{\nfloat: left;\n    text-align: center;\n    background: #a8d354;\n    padding: 15px 90px 10px;\n    border-top: 2px solid #c2e086;\n    border-left: 2px solid #b4d96b;\n    border-bottom: 2px solid #6f8b37;\n    border-right: 2px solid #7fa040;\n    cursor: pointer;\ntext-decoration:none;\ncolor: white;\n    text-transform: uppercase;\n    font-size:25px;\n}","image_html":"<a id=\"cta_button_2198284_55a87f18-cebf-4f58-a23b-9af4dc53fbc9\" class=\"cta_button\" href=\"https://cta-service-cms2.hubspot.com/ctas/v2/public/cs/c/?cta_guid=55a87f18-cebf-4f58-a23b-9af4dc53fbc9&placement_guid=91fb7a6a-7517-4a03-a217-c27039d7eb3e&portal_id=2198284&redirect_url=APefjpE4LjuGOuoii1Ju8A3mqMqIob2YdeEgpJVkPQIW9AsHWhIZzer0SH9Un1FN9OhWT98k7TmynQiqojX7fq0g6HKIny3zon1pZvvNSOfevfAuHiglxxna6JZqfuJ0xjoOw7G0USjW&hsutk=c7a0000014a4152a1c9c01600710b7e3&canon=https%3A%2F%2Fwww.clearclinica.com%2Fclear-clinica-overview%2F&click=00d9e510-0ae2-4d41-8558-33a5eec88835&utm_referrer=https%3A%2F%2Fwww.clearclinica.com%2F\"  cta_dest_link=\"http://www.clearclinica.com/pricing/\"><img id=\"hs-cta-img-91fb7a6a-7517-4a03-a217-c27039d7eb3e\" class=\"hs-cta-img \" style=\"border-width: 0px; /*hs-extra-styles*/\" mce_noresize=\"1\" alt=\"SEE PRICING\" src=\"https://cdn2.hubspot.net/hubshot/16/12/27/40351f70-797b-4ff7-bb44-295f3ce9e9c1.png\" /></a>","is_image":false,"placement_element_class":"hs-cta-91fb7a6a-7517-4a03-a217-c27039d7eb3e","raw_html":"<a id=\"cta_button_2198284_55a87f18-cebf-4f58-a23b-9af4dc53fbc9\" class=\"cta_button \" href=\"https://cta-service-cms2.hubspot.com/ctas/v2/public/cs/c/?cta_guid=55a87f18-cebf-4f58-a23b-9af4dc53fbc9&placement_guid=91fb7a6a-7517-4a03-a217-c27039d7eb3e&portal_id=2198284&redirect_url=APefjpE4LjuGOuoii1Ju8A3mqMqIob2YdeEgpJVkPQIW9AsHWhIZzer0SH9Un1FN9OhWT98k7TmynQiqojX7fq0g6HKIny3zon1pZvvNSOfevfAuHiglxxna6JZqfuJ0xjoOw7G0USjW&hsutk=c7a0000014a4152a1c9c01600710b7e3&canon=https%3A%2F%2Fwww.clearclinica.com%2Fclear-clinica-overview%2F&click=00d9e510-0ae2-4d41-8558-33a5eec88835&utm_referrer=https%3A%2F%2Fwww.clearclinica.com%2F\"  style=\"/*hs-extra-styles*/\" cta_dest_link=\"http://www.clearclinica.com/pricing/\" title=\"SEE PRICING\">SEE PRICING</a>"};
    var __hs_cta = {};

    __hs_cta.drop = function() {
        var is_legacy = document.getElementById('hs-cta-ie-element') && true || false,
            html = __hs_cta_json.image_html,
            tags = __hs_cta.getTags(),
            is_image = __hs_cta_json.is_image,
            parent, _style;

        if (!is_legacy && !is_image) {
            parent = (document.getElementsByTagName("head")[0]||document.getElementsByTagName("body")[0]);

            _style = document.createElement('style');
            parent.insertBefore(_style, parent.childNodes[0]);
            try {
                default_css = ".hs-cta-wrapper p, .hs-cta-wrapper div { margin: 0; padding: 0; }";
                cta_css = default_css + " " + __hs_cta_json.css;
                // http://blog.coderlab.us/2005/09/22/using-the-innertext-property-with-firefox/
                _style[document.all ? 'innerText' : 'textContent'] = cta_css;
            } catch (e) {
                // addressing an ie9 issue
                _style.styleSheet.cssText = cta_css;
            }

            html = __hs_cta_json.raw_html;
        }

        for (var i = 0; i < tags.length; ++i) {

            var tag = tags[i];
            var images = tag.getElementsByTagName('img');
            var cssText = "";
            var align = "";
            for (var j = 0; j < images.length; j++) {
                align = images[j].align;
                images[j].style.border = '';
                images[j].style.display = '';
                cssText = images[j].style.cssText;
            }

            if (align == "right") {
                tag.style.display = "block";
                tag.style.textAlign = "right";
            } else if (align == "middle") {
                tag.style.display = "block";
                tag.style.textAlign = "center";
            }

            tag.innerHTML = html.replace('/*hs-extra-styles*/', cssText);
            tag.style.visibility = 'visible';
            tag.setAttribute('data-hs-drop', 'true');
            window.hbspt && hbspt.cta && hbspt.cta.afterLoad && hbspt.cta.afterLoad('91fb7a6a-7517-4a03-a217-c27039d7eb3e');
        }

        return tags;
    };

    __hs_cta.getTags = function() {
        var allTags, check, i, divTags, spanTags,
            tags = [];
            if (document.getElementsByClassName) {
                allTags = document.getElementsByClassName(__hs_cta_json.placement_element_class);
                check = function(ele) {
                    return (ele.nodeName == 'DIV' || ele.nodeName == 'SPAN') && (!ele.getAttribute('data-hs-drop'));
                };
            } else {
                allTags = [];
                divTags = document.getElementsByTagName("div");
                spanTags = document.getElementsByTagName("span");
                for (i = 0; i < spanTags.length; i++) {
                    allTags.push(spanTags[i]);
                }
                for (i = 0; i < divTags.length; i++) {
                    allTags.push(divTags[i]);
                }

                check = function(ele) {
                    return (ele.className.indexOf(__hs_cta_json.placement_element_class) > -1) && (!ele.getAttribute('data-hs-drop'));
                };
            }
            for (i = 0; i < allTags.length; ++i) {
                if (check(allTags[i])) {
                    tags.push(allTags[i]);
                }
            }
        return tags;
    };

    // need to do a slight timeout so IE has time to react
    setTimeout(__hs_cta.drop, 10);

}());

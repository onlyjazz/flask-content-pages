(function() {

    var __hs_cta_json = {"css":"a#cta_button_2198284_458d25aa-7f42-49f1-b02a-b9f8934dba5d {\n  cursor:pointer; \n}\na#cta_button_2198284_458d25aa-7f42-49f1-b02a-b9f8934dba5d:hover {\n}\na#cta_button_2198284_458d25aa-7f42-49f1-b02a-b9f8934dba5d:active, #cta_button_2198284_458d25aa-7f42-49f1-b02a-b9f8934dba5d:active:hover {\n}\n\na#cta_button_2198284_458d25aa-7f42-49f1-b02a-b9f8934dba5d{\nbackground:#ffa200;\nfont-size: 16px;\n    color: white;\n    padding: 5px 15px;\n    background: #ffa200;\n    border-radius: 3px;\n    border-top: 0.5px solid #E49409;\n    border-bottom: 0.5px solid #636060;\n    text-transform: uppercase;\ntext-decoration:none;\n}\na#cta_button_2198284_458d25aa-7f42-49f1-b02a-b9f8934dba5d:hover{\nbackground:#D58906;\n}","image_html":"<a id=\"cta_button_2198284_458d25aa-7f42-49f1-b02a-b9f8934dba5d\" class=\"cta_button\" href=\"https://cta-service-cms2.hubspot.com/ctas/v2/public/cs/c/?cta_guid=458d25aa-7f42-49f1-b02a-b9f8934dba5d&placement_guid=52c2d274-040b-487e-ba4d-2768600c7492&portal_id=2198284&redirect_url=APefjpHFJWTuD8J3JT9ewUkdJp8-oWdPFAykrj7IM08TrISQ2vTTEdiZ1jP_GeGyZ-fK7ErgMWm2BsgIJOA0JWOr1hf2aJiYB78xRavWcpe8vlYczf2NQggcwfRZlcGnWSbWG0nKdVdn1G0lt__wKDI-5ISjQaNUpDx--AZeZtE6HxffeaAPKg4&hsutk=c7a00000178e1b73194a01600710c39f&canon=https%3A%2F%2Fwww.clearclinica.com%2F101-2%2F&click=e2e6c071-8edf-4ad3-879f-c0f37fa5be9c&utm_referrer=https%3A%2F%2Fwww.clearclinica.com%2F\"  cta_dest_link=\"http://explore.clearclinica.com/electronic-data-capture-system-free-demo\"><img id=\"hs-cta-img-52c2d274-040b-487e-ba4d-2768600c7492\" class=\"hs-cta-img \" style=\"border-width: 0px; /*hs-extra-styles*/\" mce_noresize=\"1\" alt=\"TRY DEMO\" src=\"https://cdn2.hubspot.net/hubshot/16/06/09/b2057958-b665-4f6f-9c2b-2c8e3db6c659.png\" /></a>","is_image":false,"placement_element_class":"hs-cta-52c2d274-040b-487e-ba4d-2768600c7492","raw_html":"<a id=\"cta_button_2198284_458d25aa-7f42-49f1-b02a-b9f8934dba5d\" class=\"cta_button \" href=\"https://cta-service-cms2.hubspot.com/ctas/v2/public/cs/c/?cta_guid=458d25aa-7f42-49f1-b02a-b9f8934dba5d&placement_guid=52c2d274-040b-487e-ba4d-2768600c7492&portal_id=2198284&redirect_url=APefjpHFJWTuD8J3JT9ewUkdJp8-oWdPFAykrj7IM08TrISQ2vTTEdiZ1jP_GeGyZ-fK7ErgMWm2BsgIJOA0JWOr1hf2aJiYB78xRavWcpe8vlYczf2NQggcwfRZlcGnWSbWG0nKdVdn1G0lt__wKDI-5ISjQaNUpDx--AZeZtE6HxffeaAPKg4&hsutk=c7a00000178e1b73194a01600710c39f&canon=https%3A%2F%2Fwww.clearclinica.com%2F101-2%2F&click=e2e6c071-8edf-4ad3-879f-c0f37fa5be9c&utm_referrer=https%3A%2F%2Fwww.clearclinica.com%2F\"  style=\"/*hs-extra-styles*/\" cta_dest_link=\"http://explore.clearclinica.com/electronic-data-capture-system-free-demo\" title=\"TRY DEMO\">TRY DEMO</a>"};
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
            window.hbspt && hbspt.cta && hbspt.cta.afterLoad && hbspt.cta.afterLoad('52c2d274-040b-487e-ba4d-2768600c7492');
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

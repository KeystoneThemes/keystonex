! function (P) {
    "use strict";
    var D = [],
        W = !1,
        M = !0;
    redux.field_objects = redux.field_objects || {}, redux.field_objects.typography = redux.field_objects.typography || {}, redux.field_objects.typography.init = function (e) {
        e = P.redux.getSelector(e, "typography"), P(e).each(function () {
            var e = P(this),
                t = e;
            (t = e.hasClass("redux-field-container") ? t : e.parents(".redux-field-container:first")).is(":hidden") || (void 0 === redux.field_objects.pro && (M = !1), e.each(function () {
                P(this).find(".redux-typography-container").each(function () {
                    var e, y, t, a = P(this),
                        r = a,
                        s = P(this).find(".redux-typography-family"),
                        i = s.data("value"),
                        o = P(this).find(".redux-typography-family").parents(".redux-container-typography:first").data("id"),
                        d = P("#" + o + " .redux-typography-google").val(),
                        p = [],
                        l = [],
                        n = P("#" + o + " .redux-typography-font-family").data("user-fonts");
                    if (!(r = a.hasClass("redux-field-container") ? r : a.parents(".redux-field-container:first")).is(":hidden") && r.hasClass("redux-field-init")) {
                        if (r.removeClass("redux-field-init"), void 0 === i ? s = P(this) : "" !== i && P(s).val(i), n = n ? 1 : 0, d = d ? 1 : 0, void 0 !== redux.customfonts && p.push(redux.customfonts), void 0 !== redux.typekitfonts && p.push(redux.typekitfonts), void 0 !== redux.stdfonts && 0 == n && p.push(redux.stdfonts), 1 == n) {
                            for (e in redux.optName.typography[o])
                                if (redux.optName.typography[o].hasOwnProperty(e))
                                    for (t in y = redux.optName.typography[o].std_font) y.hasOwnProperty(t) && l.push({
                                        id: t,
                                        text: t,
                                        "data-google": "false"
                                    });
                            p.push({
                                text: "Standard Fonts",
                                children: l
                            })
                        }(1 == d || !0 === d && void 0 !== redux.googlefonts) && p.push(redux.googlefonts), i = p, n = P(this).find(".redux-typography-family").data("value"), P(this).find(".redux-typography-family").addClass("ignore-change"), P(this).find(".redux-typography-family").select2({
                            data: i
                        }), P(this).find(".redux-typography-family").val(n).trigger("change"), P(this).find(".redux-typography-family").removeClass("ignore-change"), a.find(".redux-typography-family").hasClass("redux-typography-family") || a.find(".redux-typography-style").select2(), P(this).find(".redux-typography-align").select2(), P(this).find(".redux-typography-family-backup").select2(), P(this).find(".redux-typography-transform").select2(), P(this).find(".redux-typography-font-variant").select2(), P(this).find(".redux-typography-decoration").select2(), P(this).find(".redux-insights-data-we-collect-typography").on("click", function (e) {
                            e.preventDefault(), P(this).parent().find(".description").toggle()
                        }), redux.field_objects.typography.select(s, !0, !1, null, !0), P(this).find(".redux-typography-family, .redux-typography-family-backup, .redux-typography-style, .redux-typography-subsets, .redux-typography-align").on("change", function (e) {
                            var t, a, r = P(this).attr("id"),
                                r = P("#" + r);
                            P(this).hasClass("redux-typography-family") ? r.val() && (a = (t = P(this).select2("data")) ? t[0].text : null, r.data("value", a), D = t[0], W = !0, redux.field_objects.typography.select(r, !0, !1, a, !0)) : (e = r.val(), r.data("value", e), (P(this).hasClass("redux-typography-align") || P(this).hasClass("redux-typography-subsets") || P(this).hasClass("redux-typography-family-backup") || P(this).hasClass("redux-typography-transform") || P(this).hasClass("redux-typography-font-variant") || P(this).hasClass("redux-typography-decoration")) && (r.find('option[selected="selected"]').attr("selected", !1), r.find('option[value="' + e + '"]').attr("selected", "selected")), P(this).hasClass("redux-typography-subsets") && r.siblings(".typography-subsets").val(e), redux.field_objects.typography.select(P(this), !0, !1, null, !1))
                        }), P(this).find(".redux-typography-size, .redux-typography-height, .redux-typography-word, .redux-typography-letter, .redux-typography-margin-top, .redux-typography-margin-bottom").on("keyup", function () {
                            redux.field_objects.typography.select(P(this).parents(".redux-container-typography:first"))
                        }), P(this).find(".redux-typography-color, .redux-typography-shadow-color").wpColorPicker({
                            change: function (e, t) {
                                P(this).val(t.color.toString()), redux.field_objects.typography.select(P(this).parents(".redux-container-typography:first"))
                            }
                        }), P(this).find(".redux-typography-size").numeric({
                            allowMinus: !1
                        }), P(this).find(".redux-typography-height, .redux-typography-word, .redux-typography-letter").numeric({
                            allowMinus: !0
                        }), P(this).find(".redux-typography").on("select2:unselecting", function () {
                            var e, t, a = P(this).data("select2").options;
                            a.set("disabled", !0), setTimeout(function () {
                                a.set("disabled", !1)
                            }, 1), e = P(this).attr("id"), (t = P("#" + e)).data("value", ""), P(this).hasClass("redux-typography-family") ? (P(this).find(".redux-typography-family").addClass("ignore-change"), P(this).val(null).trigger("change"), P(this).find(".redux-typography-family").removeClass("ignore-change"), redux.field_objects.typography.select(t, !0, !1, null, !0)) : ((P(this).hasClass("redux-typography-align") || P(this).hasClass("redux-typography-subsets") || P(this).hasClass("redux-typography-family-backup") || P(this).hasClass("redux-typography-transform") || P(this).hasClass("redux-typography-font-variant") || P(this).hasClass("redux-typography-decoration")) && P("#" + e + ' option[selected="selected"]').removeAttr("selected"), P(this).hasClass("redux-typography-subsets") && t.siblings(".typography-subsets").val(""), P(this).hasClass("redux-typography-family-backup") && (P(this).find(".redux-typography-family-backup").addClass("ignore-change"), t.val(null).trigger("change"), P(this).find(".redux-typography-family-backup").removeClass("ignore-change")), redux.field_objects.typography.select(P(this), !0, !1, null, !1))
                        }), redux.field_objects.typography.updates(P(this)), window.onbeforeunload = null, r.removeClass("redux-field-init"), M || redux.field_objects.typography.sliderInit(a)
                    }
                })
            }))
        })
    }, redux.field_objects.typography.sliderInit = function (p) {
        p.find(".redux-typography-slider").each(function () {
            var e = P(this).data("id"),
                t = P(this).data("min"),
                a = P(this).data("max"),
                r = P(this).data("step"),
                s = P(this).data("default"),
                i = P(this).data("label"),
                o = Boolean(P(this).data("rtl")),
                t = [t, a],
                d = P(this).reduxNoUiSlider({
                    range: t,
                    start: s,
                    handles: 1,
                    step: r,
                    connect: "lower",
                    behaviour: "tap-drag",
                    rtl: o,
                    serialization: {
                        resolution: 1
                    },
                    slide: function () {
                        P(this).next("#redux-slider-value-" + e).attr("value", d.val()), P(this).prev("label").html(i + ":  <strong>" + d.val() + "px</strong>"), redux.field_objects.typography.select(p)
                    }
                })
        })
    }, redux.field_objects.typography.updates = function (s) {
        s.find(".update-google-fonts").on("click", function (e) {
            var t = P(this).data("action"),
                a = P(this).parent().parent(),
                r = a.attr("data-nonce");
            return a.find("p").text(redux_typography_ajax.update_google_fonts.updating), a.find("p").attr("aria-label", redux_typography_ajax.update_google_fonts.updating), a.removeClass("updating-message updated-message notice-success notice-warning notice-error").addClass("update-message notice-warning updating-message"), P.ajax({
                type: "post",
                dataType: "json",
                url: redux_typography_ajax.ajaxurl,
                data: {
                    action: "redux_update_google_fonts",
                    nonce: r,
                    data: t
                },
                error: function (e) {
                    console.log(e), a.removeClass("notice-warning updating-message updated-message notice-success").addClass("notice-error"), e = (e = e.error) && ': "' + e + '"', a.find("p").html(redux_typography_ajax.update_google_fonts.error.replace("%s", t).replace("|msg", e)), a.find("p").attr("aria-label", redux_typography_ajax.update_google_fonts.error), redux.field_objects.typography.updates(s)
                },
                success: function (e) {
                    console.log(e), "success" === e.status ? (a.find("p").html(redux_typography_ajax.update_google_fonts.success), a.find("p").attr("aria-label", redux_typography_ajax.update_google_fonts.success), a.removeClass("updating-message notice-warning").addClass("updated-message notice-success"), P(".redux-update-google-fonts").not(".notice-success").remove()) : (a.removeClass("notice-warning updating-message updated-message notice-success").addClass("notice-error"), e = (e = e.error) && ': "' + e + '"', a.find("p").html(redux_typography_ajax.update_google_fonts.error.replace("%s", t).replace("|msg", e)), a.find("p").attr("aria-label", redux_typography_ajax.update_google_fonts.error), redux.field_objects.typography.updates(s))
                }
            }), e.preventDefault(), !1
        })
    }, redux.field_objects.typography.size = function (e) {
        var t, a = 0;
        for (t in e) e.hasOwnProperty(t) && (a += 1);
        return a
    }, redux.field_objects.typography.makeBool = function (e) {
        return "false" !== e && "0" !== e && !1 !== e && 0 !== e && ("true" === e || "1" === e || !0 === e || 1 === e || void 0)
    }, redux.field_objects.typography.contrastColour = function (e) {
        var t = "#444444";
        return "" !== e && (e = e.replace("#", ""), t = 128 <= (299 * parseInt(e.substring(0, 2), 16) + 587 * parseInt(e.substring(2, 2), 16) + 114 * parseInt(e.substring(4, 2), 16)) / 1e3 ? "#444444" : "#ffffff"), t
    }, redux.field_objects.typography.select = function (y, l, h, e, g) {
        var a, t, r, u, s, f, c, x, v, m, b, i, o, _, C, w, j, k, z, I, O, S, B = !1,
            d = "",
            p = '<option value=""></option>',
            n = "",
            N = {
                300: "Light 300",
                400: "Normal 400",
                500: "Medium 500",
				600: 'Semi Bold 600',
                700: "Bold 700",
                "400italic": "Normal 400 Italic",
                "700italic": "Bold 700 Italic"
            },
            F = P(y).parents(".redux-container-typography:first").data("id");
        void 0 === F && (F = P(y).data("id")), a = P("#" + F), t = (t = P("#" + F + "-family").val()) || null, e && (t = e), e = a.find("select.redux-typography-family-backup").val(), u = a.find(".redux-typography-size").val(), s = a.find(".redux-typography-height").val(), f = a.find(".redux-typography-word").val(), c = a.find(".redux-typography-letter").val(), x = a.find("select.redux-typography-align").val(), v = a.find("select.redux-typography-transform").val(), m = a.find("select.redux-typography-font-variant").val(), b = a.find("select.redux-typography-decoration").val(), i = a.find("select.redux-typography-style").val(), o = a.find("select.redux-typography-subsets").val(), _ = a.find(".redux-typography-color").val(), O = a.find(".redux-typography-margin-top").val(), S = a.find(".redux-typography-margin-bottom").val(), I = a.data("units"), !0 === W ? (r = redux.field_objects.typography.makeBool(D["data-google"]), a.find(".redux-typography-google-font").val(r)) : r = redux.field_objects.typography.makeBool(a.find(".redux-typography-google-font").val()), g && (a.hasClass("typography-initialized") || (i = a.find("select.redux-typography-style").data("value"), o = a.find("select.redux-typography-subsets").data("value"), "" !== i && (i = String(i)), o = String(o)), void 0 === redux.fonts.google && (r = !1), d = !0 === r && t in redux.fonts.google ? redux.fonts.google[t] : void 0 !== redux.fonts.typekit && t in redux.fonts.typekit ? (B = !0, redux.fonts.typekit[t]) : N, P(y).hasClass("redux-typography-subsets") && a.find("input.typography-subsets").val(o), P(y).hasClass("redux-typography-family") ? (!0 === r ? (P.each(d.variants, function (e, t) {
            t.id === i || 1 === redux.field_objects.typography.size(d.variants) ? (n = ' selected="selected"', i = t.id) : n = "", p += '<option value="' + t.id + '"' + n + ">" + t.name.replace(/\+/g, " ") + "</option>"
        }), h && a.find(".redux-typography-style").select2("destroy"), a.find(".redux-typography-style").html(p).select2(), n = "", p = '<option value=""></option>', P.each(d.subsets, function (e, t) {
            o === t.id || 1 === redux.field_objects.typography.size(d.subsets) ? (n = ' selected="selected"', o = t.id, a.find("input.typography-subsets").val(o)) : n = "", p += '<option value="' + t.id + '"' + n + ">" + t.name.replace(/\+/g, " ") + "</option>"
        }), h && a.find(".redux-typography-subsets").select2("destroy"), a.find(".redux-typography-subsets").html(p).select2({
            width: "100%"
        }), a.find(".redux-typography-subsets").parent().fadeIn("fast"), a.find(".typography-family-backup").fadeIn("fast")) : !0 === B ? (P.each(d.variants, function (e, t) {
            i === t.id || 1 === redux.field_objects.typography.size(d.variants) ? (n = ' selected="selected"', i = t.id) : n = "", p += '<option value="' + t.id + '"' + n + ">" + t.name.replace(/\+/g, " ") + "</option>"
        }), a.find(".redux-typography-style").select2("destroy"), a.find(".redux-typography-style").html(p).select2(), a.find(".redux-typography-subsets").parent().fadeOut("fast"), a.find(".typography-family-backup").fadeOut("fast")) : a.find(".redux-typography-style") && (P.each(N, function (e, t) {
            i === e || "normal" === e ? (n = ' selected="selected"', a.find(".typography-style select2-selection__rendered").text(t)) : n = "", p += '<option value="' + e + '"' + n + ">" + t.replace("+", " ") + "</option>"
        }), h && a.find(".redux-typography-style").select2("destroy"), a.find(".redux-typography-style").html(p).select2()), a.find(".redux-typography-font-family").val(t)) : P(y).hasClass("redux-typography-family-backup") && "" !== e ? a.find(".redux-typography-font-family-backup").val(e) : (d = N) && (P.each(d, function (e, t) {
            i === e || "normal" === e ? (n = ' selected="selected"', a.find(".typography-style select2-selection__rendered").text(t)) : n = "", p += '<option value="' + e + '"' + n + ">" + t.replace("+", " ") + "</option>"
        }), h && a.find(".redux-typography-style").select2("destroy"), a.find(".redux-typography-style").html(p).select2(), a.find(".redux-typography-subsets").parent().fadeOut("fast"), a.find(".typography-family-backup").fadeOut("fast"))), g && (a.find(".redux-typography-style").addClass("ignore-change"), 0 === a.find("select.redux-typography-style option[value='" + i + "']").length ? (i = "", a.find("select.redux-typography-style").val("").trigger("change")) : "400" === i && a.find("select.redux-typography-style").val(i).trigger("change"), a.find(".redux-typography-style").removeClass("ignore-change"), 0 === a.find("select.redux-typography-subsets option[value='" + o + "']").length && (o = "", a.find(".redux-typography-style").addClass("ignore-change"), a.find("select.redux-typography-subsets").val("").trigger("change"), a.find("input.typography-subsets").val(o), a.find(".redux-typography-style").removeClass("ignore-change"))), P("." + ("style_link_" + F)).remove(), null !== t && "inherit" !== t && a.hasClass("typography-initialized") && (B = t.replace(/\s+/g, "+"), !0 === r ? (e = B, i && "" !== i && (e += ":" + i.replace(/\-/g, " ")), o && "" !== o && (e += "&subset=" + o), !1 === W && "undefined" != typeof WebFont && WebFont && WebFont.load({
            google: {
                families: [e]
            }
        }), a.find(".redux-typography-google").val(!0)) : a.find(".redux-typography-google").val(!1)), i && -1 !== i.indexOf("italic") ? (a.find(".typography-preview").css("font-style", "italic"), a.find(".typography-font-style").val("italic"), i = i.replace("italic", "")) : (a.find(".typography-preview").css("font-style", "normal"), a.find(".typography-font-style").val("")), a.find(".typography-font-weight").val(i), Boolean(a.find(".redux-typography-height").data("allow-empty")) || (s = s || u), "" === u || void 0 === u ? a.find(".typography-font-size").val("") : (N = a.find(".redux-typography-size").data("unit"), a.find(".typography-font-size").val(u + N)), "" === s || void 0 === s ? a.find(".typography-line-height").val("") : (j = a.find(".redux-typography-height").data("unit"), a.find(".typography-line-height").val(s + j)), "" === f || void 0 === f ? a.find(".typography-word-spacing").val("") : (k = a.find(".redux-typography-word").data("unit"), a.find(".typography-word-spacing").val(f + k)), "" === c || void 0 === c ? a.find(".typography-letter-spacing").val("") : (z = a.find(".redux-typography-letter").data("unit"), a.find(".typography-letter-spacing").val(c + z)), "" === O || void 0 === O ? a.find(".typography-margin-top").val("") : (C = a.find(".redux-typography-margin-top").data("unit"), a.find(".typography-margin-top").val(O + C)), "" === S || void 0 === S ? a.find(".typography-margin-bottom").val("") : (w = a.find(".redux-typography-margin-bottom").data("unit"), a.find(".typography-margin-bottom").val(S + w)), a.hasClass("typography-initialized") && (0 === a.find(".typography-preview").data("preview-size") && a.find(".typography-preview").css("font-size", u + I), a.find(".typography-preview").css({
            "font-weight": i,
            "text-align": x,
            "font-family": t + ", sans-serif",
            "padding-top": O + C,
            "padding-bottom": S + w
        }), "none" === t && "" === t && a.find(".typography-preview").css("font-family", "inherit"), a.find(".typography-preview").css({
            "line-height": s + j,
            "word-spacing": f + k,
            "letter-spacing": c + z
        }), _ && a.find(".typography-preview").css("color", _), M || redux.field_objects.typography.previewShadow(F), a.find(".typography-style select2-selection__rendered").text(a.find(".redux-typography-style option:selected").text()), a.find(".typography-script select2-selection__rendered").text(a.find(".redux-typography-subsets option:selected").text()), x && a.find(".typography-preview").css("text-align", x), v && a.find(".typography-preview").css("text-transform", v), m && a.find(".typography-preview").css("font-variant", m), b && a.find(".typography-preview").css("text-decoration", b), a.find(".typography-preview").slideDown()), a.hasClass("typography-initialized") || a.addClass("typography-initialized"), W = !1, l || redux_change(y)
    }, redux.field_objects.typography.previewShadow = function (e) {
        var t = P("#" + e + " .redux-typography-shadow-color").val(),
            a = P("#redux-slider-value-" + e + "-h").val(),
            r = P("#redux-slider-value-" + e + "-v").val(),
            s = P("#redux-slider-value-" + e + "-b").val();
        t && P("#" + e + " .typography-preview").css("text-shadow", a + "px " + r + "px " + s + "px " + t)
    }
}(jQuery);
###
* --------------------------------------------------------------------------------------------------------------------
* main navigation toggling
* --------------------------------------------------------------------------------------------------------------------
###
$(document).ready ->
  nav_toggler = $("header .toggle-nav")
  nav = $("#main-nav")
  content = $("#content")
  body = $("body")
  click_event = (if jQuery.support.touch then "tap" else "click")

  $("#main-nav .dropdown-collapse").on click_event, (e) ->
    e.preventDefault()
    link = $(this)
    list = link.parent().find("> ul")

    if list.is(":visible")
      if body.hasClass("main-nav-closed") && link.parents("li").length == 1
        false
      else
        link.removeClass("in")
        list.slideUp 300, ->
          $(this).removeClass("in")
    else
      $(document).trigger("nav-open") if list.parents("ul.nav.nav-stacked").length == 1
      link.addClass("in")
      list.slideDown 300, ->
        $(this).addClass("in")
    false

  if jQuery.support.touch
    body.on "swiperight", (e) ->
      $(document).trigger("nav-open")
    body.on "swipeleft", (e) ->
      $(document).trigger("nav-close")

  nav_toggler.on click_event, ->
    if nav_open()
      $(document).trigger("nav-close")
    else
      $(document).trigger("nav-open")
    false

  $(document).bind "nav-close", (event, params) ->
    body.removeClass("main-nav-opened").addClass("main-nav-closed")
    nav_open = false

  $(document).bind "nav-open", (event, params) ->
    body.addClass("main-nav-opened").removeClass("main-nav-closed")
    nav_open = true

@nav_open = ->
  return $("body").hasClass("main-nav-opened") || $("#main-nav").width() > 50

###
* --------------------------------------------------------------------------------------------------------------------
* plugin initializations
* --------------------------------------------------------------------------------------------------------------------
###
$(document).ready ->
  setTimeAgo()
  setScrollable()
  setSortable($(".sortable"))
  setSelect2()
  setAutoSize()
  setCharCounter()
  setMaxLength()
  setValidateForm()
  setSwipebox()

  ###
  * --------------------------------------------------------------------------------------------------------------------
  * removes .box after click on .box-remove button
  * --------------------------------------------------------------------------------------------------------------------
  ###
  $(".box .box-remove").on "click", (e) ->
    $(this).parents(".box").first().remove()
    e.preventDefault()
    return false

  ###
  * --------------------------------------------------------------------------------------------------------------------
  * collapse .box after click on .box-collapse button
  * --------------------------------------------------------------------------------------------------------------------
  ###
  $(".box .box-collapse").on "click", (e) ->
    box = $(this).parents(".box").first()
    box.toggleClass("box-collapsed")
    e.preventDefault()
    return false

  ###
  * --------------------------------------------------------------------------------------------------------------------
  * password strength
  * --------------------------------------------------------------------------------------------------------------------
  ###
  if jQuery().pwstrength
    $('.pwstrength').pwstrength
      ui:
        showVerdictsInsideProgressBar: true
        viewports: progress: '.pwstrength-viewport-progress'

  ###
  * --------------------------------------------------------------------------------------------------------------------
  * check all checkboxes in table with class only-checkbox
  * --------------------------------------------------------------------------------------------------------------------
  ###
  $(".check-all").on "click", (e) ->
    $(this).parents("table:eq(0)").find(".only-checkbox :checkbox").attr "checked", @checked

  ###
  * --------------------------------------------------------------------------------------------------------------------
  * setting up responsive tabs
  * --------------------------------------------------------------------------------------------------------------------
  ###
  $('.nav-responsive.nav-pills, .nav-responsive.nav-tabs').tabdrop() if jQuery().tabdrop

  ###
  * --------------------------------------------------------------------------------------------------------------------
  * setting up datatables
  * --------------------------------------------------------------------------------------------------------------------
  ###
  setDataTable($(".data-table"))
  setDataTable($(".data-table-column-filter"))

  ###
  * --------------------------------------------------------------------------------------------------------------------
  * setting up sortable list
  * --------------------------------------------------------------------------------------------------------------------
  ###
  $('.dd-nestable').nestable() if jQuery().nestable

  ###
  * --------------------------------------------------------------------------------------------------------------------
  * affixing main navigation
  * --------------------------------------------------------------------------------------------------------------------
  ###
  unless $("body").hasClass("fixed-header")
    if jQuery().affix
      $('#main-nav.main-nav-fixed').affix
        offset: 40

  ###
  * --------------------------------------------------------------------------------------------------------------------
  * setting up bootstrap popovers
  * --------------------------------------------------------------------------------------------------------------------
  ###
  touch = false
  if window.Modernizr
    touch = Modernizr.touch
  unless touch
    $("body").on "mouseenter", ".has-popover", ->
      el = $(this)
      if el.data("popover") is `undefined`
        el.popover
          placement: el.data("placement") or "top"
          container: "body"
      el.popover "show"

    $("body").on "mouseleave", ".has-popover", ->
      $(this).popover "hide"

  ###
  * --------------------------------------------------------------------------------------------------------------------
  * setting up bootstrap tooltips
  * --------------------------------------------------------------------------------------------------------------------
  ###
  touch = false
  if window.Modernizr
    touch = Modernizr.touch
  unless touch
    $("body").on "mouseenter", ".has-tooltip", ->
      el = $(this)
      if el.data("tooltip") is `undefined`
        el.tooltip
          placement: el.data("placement") or "top"
          container: "body"
      el.tooltip "show"

    $("body").on "mouseleave", ".has-tooltip", ->
      $(this).tooltip "hide"

  ###
  * --------------------------------------------------------------------------------------------------------------------
  * replacing svg images for png fallback
  * --------------------------------------------------------------------------------------------------------------------
  ###
  if window.Modernizr && Modernizr.svg == false
    $("img[src*=\"svg\"]").attr "src", ->
      $(this).attr("src").replace ".svg", ".png"

  ###
  * --------------------------------------------------------------------------------------------------------------------
  * color pickers
  * --------------------------------------------------------------------------------------------------------------------
  ###
  if jQuery().colorpicker
    $(".colorpicker-hex").colorpicker()
    $(".colorpicker-hex-horizontal").colorpicker horizontal: true
    $(".colorpicker-rgb").colorpicker format: "rgba"
    $(".colorpicker-rgb-horizontal").colorpicker format: "rgba", horizontal: true
  # --------------------------------------------------------------------------------------------------------------------

  ###
  * --------------------------------------------------------------------------------------------------------------------
  * bootstrap switch
  * --------------------------------------------------------------------------------------------------------------------
  ###
  if jQuery().bootstrapSwitch
    $(".make-switch").bootstrapSwitch()
  # --------------------------------------------------------------------------------------------------------------------

  ###
  * --------------------------------------------------------------------------------------------------------------------
  * datetimepickers
  * --------------------------------------------------------------------------------------------------------------------
  ###
  if jQuery().datetimepicker
    $(".datetimepicker-input").each (i, elem) ->
      $(elem).datetimepicker
        format: $(elem).find('input').data('format')
        icons: {
          time: "fa fa-clock-o",
          date: "fa fa-calendar",
          up: "fa fa-arrow-up",
          down: "fa fa-arrow-down"
          previous: 'fa fa-chevron-left',
          next: 'fa fa-chevron-right',
          today: 'fa fa-calendar-check-o',
          clear: 'fa fa-trash',
          close: 'fa fa-remove'
        }

    $(".datepicker-input").each (i, elem) ->
      $(elem).datetimepicker
        format: $(elem).find('input').data('format')
        icons: {
          time: "fa fa-clock-o",
          date: "fa fa-calendar",
          up: "fa fa-arrow-up",
          down: "fa fa-arrow-down"
          previous: 'fa fa-chevron-left',
          next: 'fa fa-chevron-right',
          today: 'fa fa-calendar-check-o',
          clear: 'fa fa-trash',
          close: 'fa fa-remove'
        }

    $(".timepicker-input").each (i, elem) ->
      $(elem).datetimepicker
        format: $(elem).find('input').data('format')
        icons: {
          time: "fa fa-clock-o",
          date: "fa fa-calendar",
          up: "fa fa-arrow-up",
          down: "fa fa-arrow-down"
          previous: 'fa fa-chevron-left',
          next: 'fa fa-chevron-right',
          today: 'fa fa-calendar-check-o',
          clear: 'fa fa-trash',
          close: 'fa fa-remove'
        }

  ###
  * --------------------------------------------------------------------------------------------------------------------
  * setting bootstrap file input
  * --------------------------------------------------------------------------------------------------------------------
  ###
  if jQuery().fileinput
    $('input[data-file-input]').fileinput({
      theme: "fa"
    });

  ###
  * --------------------------------------------------------------------------------------------------------------------
  * modernizr fallbacks
  * --------------------------------------------------------------------------------------------------------------------
  ###
  if window.Modernizr
    unless Modernizr.input.placeholder
      $("[placeholder]").focus(->
        input = $(this)
        if input.val() is input.attr("placeholder")
          input.val ""
          input.removeClass "placeholder"
      ).blur(->
        input = $(this)
        if input.val() is "" or input.val() is input.attr("placeholder")
          input.addClass "placeholder"
          input.val input.attr("placeholder")
      ).blur()
      $("[placeholder]").parents("form").submit ->
        $(this).find("[placeholder]").each ->
          input = $(this)
          input.val ""  if input.val() is input.attr("placeholder")

###
* --------------------------------------------------------------------------------------------------------------------
* max length counter
* --------------------------------------------------------------------------------------------------------------------
###
@setMaxLength = (selector = $(".char-max-length")) ->
  selector.maxlength() if jQuery().maxlength

###
* --------------------------------------------------------------------------------------------------------------------
* character counter
* --------------------------------------------------------------------------------------------------------------------
###
@setCharCounter = (selector = $(".char-counter")) ->
  if jQuery().charCount
    selector.charCount
      allowed: selector.data("char-allowed")
      warning: selector.data("char-warning")
      cssWarning: "text-warning"
      cssExceeded: "text-error"

###
* --------------------------------------------------------------------------------------------------------------------
* autosize feature for expanding textarea elements
* --------------------------------------------------------------------------------------------------------------------
###
@setAutoSize = (selector = $(".autosize")) ->
  autosize(selector) if typeof autosize == 'function'

###
* --------------------------------------------------------------------------------------------------------------------
* timeago feature converts static time to dynamically refreshed
* --------------------------------------------------------------------------------------------------------------------
###
@setTimeAgo = (selector = $(".timeago")) ->
  if jQuery().timeago
    jQuery.timeago.settings.allowFuture = true
    jQuery.timeago.settings.refreshMillis = 60000
    selector.timeago();
    selector.addClass("in")

###
* --------------------------------------------------------------------------------------------------------------------
* scrollable boxes
* --------------------------------------------------------------------------------------------------------------------
###
@setScrollable = (selector = $(".scrollable")) ->
  if jQuery().slimScroll
    selector.each (i, elem) ->
      $(elem).slimScroll
        height: $(elem).data("scrollable-height")
        start: $(elem).data("scrollable-start") || "top"

###
* --------------------------------------------------------------------------------------------------------------------
* jquery ui sortable
* --------------------------------------------------------------------------------------------------------------------
###
@setSortable = (selector = null) ->
  if jQuery().sortable
    if selector
      selector.sortable
        axis: selector.data("sortable-axis")
        connectWith: selector.data("sortable-connect")

###
* --------------------------------------------------------------------------------------------------------------------
* select 2 selects
* --------------------------------------------------------------------------------------------------------------------
###
@setSelect2 = (selector = $(".select2")) ->
  if jQuery().select2
    $.fn.select2.defaults.set("theme", "bootstrap");
    selector.each (i, elem) ->
      $(elem).select2()

###
* --------------------------------------------------------------------------------------------------------------------
* datatables
* --------------------------------------------------------------------------------------------------------------------
###
@setDataTable = (selector) ->
  if jQuery().DataTable
    selector.each (i, elem) ->
      dt = $(elem).DataTable
        fnDrawCallback: (oSettings) ->
          $(this).closest('.dataTables_wrapper').find('div[id$=_filter] input').addClass("form-control input-sm").attr('placeholder', $(this).closest('.dataTables_wrapper').find('div[id$=_filter] label').text().replace(":", "..."))

      if $(elem).hasClass("data-table-column-filter")
        $(elem).find('tfoot th').each ->
          title = $(this).text()
          $(this).html '<input class="form-control input-sm" style="display:block;width: 100%;font-weight:normal;" type="text" placeholder="Search ' + title + '" />'
          return

        dt.columns().every ->
          that = this
          $('input', @footer()).on 'keyup change', ->
            if that.search() != @value
              that.search(@value).draw()

#        dt.columnFilter()
#        $(this).closest('.dataTables_wrapper').find(".text_filter").addClass("form-control input-sm")

###
* --------------------------------------------------------------------------------------------------------------------
* form validation
* --------------------------------------------------------------------------------------------------------------------
###
@setValidateForm = (selector = $(".validate-form")) ->
  if jQuery().validate
    selector.each (i, elem) ->
      $(elem).validate
        errorElement: "span"
        errorClass: "help-block has-error"
        errorPlacement: (e, t) ->
          t.parents(".controls").first().append e

        highlight: (e) ->
          $(e).closest('.form-group').removeClass("has-error has-success").addClass('has-error');

        success: (e) ->
          e.closest(".form-group").removeClass("has-error")

###
* --------------------------------------------------------------------------------------------------------------------
* swipebox
* --------------------------------------------------------------------------------------------------------------------
###
@setSwipebox = (selector = $(".swipebox")) ->
  if jQuery().swipebox
    selector.swipebox()

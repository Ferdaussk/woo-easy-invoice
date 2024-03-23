// console.log(woeic_estimass_color_value);
$(document).ready(function () {
    // Change theme
    $(".css").on("click", function (evt) {
      var theme = this.innerHTML.toLowerCase().replace(" ", "-"),
        url =
          "https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/" +
          theme +
          "/jquery-ui.css";
      $("#jquiCSS").attr("href", url);
      $(".css").removeClass("sel");
      $(this).addClass("sel");
    });

    // Events demo
    function setColor(evt, color) {
      if (color) {
        $("#cpEvent").css("background-color", color);
      }
    }

    $("#cpBinding")
      .colorpicker({
        color: "#ebf1dd",
        initialHistory: ["#ff0000", "#000000", "red", "purple"],
      })
      .on("change.color", setColor)
      .on("mouseover.color", setColor);

    //=================cp1=========///////////
    // Methods demo
    $("#getVal").on("click", function () {
      alert('Selected color = "' + $("#cp1").colorpicker("val") + '"');
    });
    $("#setVal").on("click", function () {
      $("#cp1").colorpicker("val", "#31859b");
    });
    $("#enable").on("click", function () {
      $("#cp1").colorpicker("enable");
    });
    $("#disable").on("click", function () {
      $("#cp1").colorpicker("disable");
    });
    $("#clear").on("click", function () {
      $("#cp1").colorpicker("clear");
    });
    $("#destroy1").on("click", function () {
      $("#cp1").colorpicker("destroy");
    });
    //=================cp1=========///////////

    //=================cp2=========///////////
    // Methods demo
    $("#getVal").on("click", function () {
      alert('Selected color = "' + $("#cp2").colorpicker("val") + '"');
    });
    $("#setVal").on("click", function () {
      $("#cp2").colorpicker("val", "#31859b");
    });
    $("#enable").on("click", function () {
      $("#cp2").colorpicker("enable");
    });
    $("#disable").on("click", function () {
      $("#cp2").colorpicker("disable");
    });
    $("#clear").on("click", function () {
      $("#cp2").colorpicker("clear");
    });
    $("#destroy1").on("click", function () {
      $("#cp2").colorpicker("destroy");
    });
    //=================cp2=========///////////

    //=================cp3=========///////////
    // Methods demo
    $("#getVal").on("click", function () {
      alert('Selected color = "' + $("#cp3").colorpicker("val") + '"');
    });
    $("#setVal").on("click", function () {
      $("#cp3").colorpicker("val", "#31859b");
    });
    $("#enable").on("click", function () {
      $("#cp3").colorpicker("enable");
    });
    $("#disable").on("click", function () {
      $("#cp3").colorpicker("disable");
    });
    $("#clear").on("click", function () {
      $("#cp3").colorpicker("clear");
    });
    $("#destroy1").on("click", function () {
      $("#cp3").colorpicker("destroy");
    });
    //=================cp3=========///////////

    //=================cp4=========///////////
    // Methods demo
    $("#getVal").on("click", function () {
      alert('Selected color = "' + $("#cp4").colorpicker("val") + '"');
    });
    $("#setVal").on("click", function () {
      $("#cp4").colorpicker("val", "#31859b");
    });
    $("#enable").on("click", function () {
      $("#cp4").colorpicker("enable");
    });
    $("#disable").on("click", function () {
      $("#cp4").colorpicker("disable");
    });
    $("#clear").on("click", function () {
      $("#cp4").colorpicker("clear");
    });
    $("#destroy1").on("click", function () {
      $("#cp4").colorpicker("destroy");
    });
    //=================cp4=========///////////

    //=================cp5=========///////////
    // Methods demo
    $("#getVal").on("click", function () {
      alert('Selected color = "' + $("#cp5").colorpicker("val") + '"');
    });
    $("#setVal").on("click", function () {
      $("#cp5").colorpicker("val", "#31859b");
    });
    $("#enable").on("click", function () {
      $("#cp5").colorpicker("enable");
    });
    $("#disable").on("click", function () {
      $("#cp5").colorpicker("disable");
    });
    $("#clear").on("click", function () {
      $("#cp5").colorpicker("clear");
    });
    $("#destroy1").on("click", function () {
      $("#cp5").colorpicker("destroy");
    });
    //=================cp5=========///////////

    // Methods demo 2 (inline colorpicker)
    $("#getVal2").on("click", function () {
      alert(
        'Selected color = "' + $("#cpInline").colorpicker("val") + '"'
      );
    });
    $("#setVal2").on("click", function () {
      $("#cpInline").colorpicker("val", "#31859b");
    });
    $("#enable2").on("click", function () {
      $("#cpInline").colorpicker("enable");
    });
    $("#disable2").on("click", function () {
      $("#cpInline").colorpicker("disable");
    });
    $("#destroy2").on("click", function () {
      $("#cpInline").colorpicker("destroy");
    });

    //=================cp1=========///////////
    // Instanciate colorpickers
    $("#cp1").colorpicker({
      color: woeic_estimass_color_value,
      initialHistory: ["#ff0000", "#000000", "red", "purple"],
    });
    //=================cp1=========///////////

    //=================cp2=========///////////
    // Instanciate colorpickers
    $("#cp2").colorpicker({
      color: woeic_estimass_color_value2,
      initialHistory: ["#ff0000", "#000000", "red", "purple"],
    });
    //=================cp2=========///////////

    //=================cp3=========///////////
    // Instanciate colorpickers
    $("#cp3").colorpicker({
      color: woeic_estimass_color_value3,
      initialHistory: ["#ff0000", "#000000", "red", "purple"],
    });
    //=================cp3=========///////////

    //=================cp4=========///////////
    // Instanciate colorpickers
    $("#cp4").colorpicker({
      color: woeic_estimass_color_value4,
      initialHistory: ["#ff0000", "#000000", "red", "purple"],
    });
    //=================cp4=========///////////

    //=================cp5=========///////////
    // Instanciate colorpickers
    $("#cp5").colorpicker({
      color: woeic_estimass_color_value5,
      initialHistory: ["#ff0000", "#000000", "red", "purple"],
    });
    //=================cp2=========///////////

    $("#cpBinding").colorpicker({
      color: "#ebf1dd",
    });
    $("#cpInline").colorpicker({ color: "#92cddc" });
    $("#cpInline2").colorpicker({
      color: "#92cddc",
      defaultPalette: "web",
    });

    // Custom theme palette
    $("#customTheme").colorpicker({
      color: "#f44336",
      customTheme: [
        "#f44336",
        "#ff9800",
        "#ffc107",
        "#4caf50",
        "#00bcd4",
        "#3f51b5",
        "#9c27b0",
        "white",
        "black",
      ],
    });
    $("#cpButton").colorpicker({ showOn: "button" });
    $("#cpFocus").colorpicker({ showOn: "focus" });
    $("#cpBoth").colorpicker();
    $("#cpOther").colorpicker({ showOn: "none" });

    $("#show").on("click", function (evt) {
      evt.stopImmediatePropagation();
      $("#cpOther").colorpicker("showPalette");
    });

    // With transparent color
    $("#transColor").colorpicker({
      transparentColor: true,
    });

    // With hidden button
    $("#hideButton").colorpicker({
      hideButton: true,
    });

    // No color indicator
    $("#noIndColor").colorpicker({
      displayIndicator: false,
    });

    // French colorpicker
    $("#frenchColor").colorpicker({
      strings:
        "Couleurs de themes,Couleurs de base,Plus de couleurs,Moins de couleurs,Palette,Historique,Pas encore d'historique.",
    });

    // Fix links
    $('a[href="#"]').attr("href", "javascript:void(0)");
  });
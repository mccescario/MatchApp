function template () {
    const count = $(".list__item").length;

    let html = '<div class="list__item" sortable-item="sortable-item">';
        html += '<div class="list__item-content">';
        html += '<button type="button" class="remove"></button><input class="list__item-input" name="teams[s_team_list_'+count+']" id="team_list_'+count+'" type="text" placeholder="Team name">';
        html += '</div>';
        html += '<div class="list__item-handle" sortable-handle="sortable-handle"></div>';
        html += '</div>';

    return html;
}

var fixHelper = function (e, ui) {
  $('.list div').children().each(function () {
    $(this).width($(this).width());
  });
  return ui;
};


//Multisortable options
$(".list").multisortable({
  items: '.list__item',
  handle: '.list__item-handle',
  selectedClass: "selected",
  start: function (elements, element) {
    const selected = $(".selected").length;
    const correction = selected * 7;
    element.placeholder.height(element.item.height() + correction * (selected));

  },
  update: function (elements, element) {

  }
});

$(document).on("click", "#add-team",function() {
    const temp = template();
    const target = $(".list");
    target.append(temp);
});

$(document).on("click", ".remove",function() {
    $(this).closest('.list__item').remove();
});

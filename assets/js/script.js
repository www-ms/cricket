$(".js-header-toggler").click(function () {
  $(this).toggleClass("is-active");
  $("body").toggleClass("menu-opened");
});

let table = new DataTable("#MatchTable", {
  responsive: true,
  lengthChange: false,
  pageLength: 10,
  paginate: true,
  searching: false,
});

if ($(".dt-info").length) {
  $("#MatchTable_wrapper").click(function () {
    setTimeout(function () {
      $(".dt-info")[0].textContent = $(".dt-info")[0].textContent.replace(/showing|entries/gi, "");
    }, 0);
  });

  $(".dt-info")[0].textContent = $(".dt-info")[0].textContent.replace(/showing|entries/gi, "");
}

fillKey();

showField();

deleteKey();

let field_set = $(".fields-set").eq(0).clone();

$("#add").click(function () {
  field_set.clone().removeClass('d-none').appendTo(".fields-container");
  showField();
  ordering();
  fillKey();
  deleteKey();
});

ordering();

let el = document.getElementById("main-group");
Sortable.create(el, {
  handle: ".field-move",
  animation: 300,
  onEnd: function (e) {
    ordering();
  },
});


$('.fields [type="submit"]').click(function () {
  $(".fields form").submit();
});
//  =========== functions =============
function ordering() {
  let list = $(".field-move small");

  list.each((i, el) => {
    $(el).text(i);
  });
}

function showField() {
  $(".fields select").on("change", function () {
    chageShow(this)
  });
}

$(".fields select").each((i,el)=>{
  chageShow(el)
})

function fillKey() {
  $(".name").blur(function () {
    let val = $(this).val();
    let key = val.trim().replace(/\s+/gm, "_").toLowerCase();
    let nextVal = $(this).parent().parent().parent().next().find(".key");

    if (!nextVal.val().trim()) {
      nextVal.val(key);
    }
  });
}

function deleteKey() {
  $(".del").click(function () {
    $(this).closest(".fields-set").remove();
    ordering();
  });
}

function chageShow(el) {
  if (["radio", "select", "checkbox"].includes(el.value)) {
    $(el).closest(".form-group").find(".choice-field").removeClass("d-none");
  } else {
    $(el).closest(".form-group").find(".choice-field").addClass("d-none");
  }
}

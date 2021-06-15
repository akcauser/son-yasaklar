/*! SVG Türkiye Haritası | MIT Lisans | dnomak.com */

function svgturkiyeharitasi() {
  const element = document.querySelector('#svg-turkiye-haritasi');
  const info = document.querySelector('.il-isimleri');

  element.addEventListener(
    'mouseover',
    function (event) {
      if (event.target.tagName === 'path' && event.target.parentNode.id !== 'guney-kibris') {
        info.innerHTML = [
          '<div>',
          event.target.parentNode.getAttribute('data-iladi'),
          '</div>'
        ].join('');
      }
    }
  );

  element.addEventListener(
    'mousemove',
    function (event) {
      info.style.top = event.pageY + 25 + 'px';
      info.style.left = event.pageX + 'px';
    }
  );

  element.addEventListener(
    'mouseout',
    function (event) {
      info.innerHTML = '';
    }
  );

  let oldPath = null;
  element.addEventListener(
    'click',
    function (event) {
      if (event.target.tagName === 'path') {
        const parent = event.target.parentNode;
        const id = parent.getAttribute('id');
        if (oldPath != null) {
          oldPath.setAttribute('style', 'fill: #222')
        }

        oldPath = event.target;
        event.target.setAttribute('style', 'fill: green')

        if (
          id === 'guney-kibris'
        ) {
          return;
        }
        dataReference = id
          + '-'
          + parent.getAttribute('data-plakakodu');

        window.location.href = (
          '#'
          + dataReference
        );

        const url = 'https://panel.sonyasaklar.com/api/items/' + dataReference + '/slug';
        $.get(url, function () {
          let city = "";
          let description = "";
        }).done(function (data) {
          city = data.city;
          description = data.description
        }).fail(function () {
          city = ""
          description = ""
        }).always(function () {
          $("#itemCity").html(city);
          $("#itemDescription").html(description);
        });
      }
    }
  );
}
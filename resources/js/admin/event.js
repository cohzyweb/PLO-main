import flatpickr from "flatpickr";
import { Japanese } from "flatpickr/dist/l10n/ja.js";
import "flatpickr/dist/flatpickr.min.css";
import tinymce from 'tinymce/tinymce';
import 'tinymce/icons/default';
import 'tinymce/themes/silver';
import 'tinymce/models/dom';
import 'tinymce/plugins/link';
import 'tinymce/plugins/image';
import 'tinymce/plugins/code';
import 'tinymce/plugins/lists';
// import 'tinymce/plugins/fontfamily';
import 'tinymce-i18n/langs6/ja';

// TinyMCEのスタイル
import 'tinymce/skins/ui/oxide/skin.min.css';
import 'tinymce/skins/content/default/content.min.css';
// Flatpickrの初期化
document.addEventListener('DOMContentLoaded', function () {
  // 配信設定のラジオボタン制御
  const publishTypeRadios = document.querySelectorAll('input[name="publish_type"]');
  const scheduleDatetime = document.getElementById('schedule_datetime');

  function toggleScheduleDatetime(show) {
    scheduleDatetime.style.display = show ? 'block' : 'none';
  }

  // 初期状態の設定
  const checkedRadio = document.querySelector('input[name="publish_type"]:checked');
  toggleScheduleDatetime(checkedRadio && checkedRadio.value === '2');

  // ラジオボタンの変更イベント
  publishTypeRadios.forEach(radio => {
    radio.addEventListener('change', function() {
      toggleScheduleDatetime(this.value === '2');
    });
  });

  // published_atの値を取得
  const publishedAtInput = document.querySelector('input[name="published_at"]');
  const publishedAtValue = publishedAtInput.value;
  const defaultDate = new Date(publishedAtValue);
  const minutes = Math.ceil(defaultDate.getMinutes() / 15) * 15;
  defaultDate.setMinutes(minutes);

  flatpickr(".flatpickr-input", {
    enableTime: true,
    dateFormat: "Y-m-d H:i",
    time_24hr: true,
    minuteIncrement: 15,
    locale: Japanese,
    minDate: "2024-01-01 00:00",
    defaultDate: defaultDate,
    onChange: function(selectedDates, dateStr) {
      const date = selectedDates[0];
      const minutes = date.getMinutes();
      const adjustedMinutes = Math.round(minutes / 15) * 15;
      date.setMinutes(adjustedMinutes);
      this.setDate(date);
    },
    monthSelectorType: "static",
    yearSelectorType: "static",
    allowInput: true,
    showMonths: 1,
    static: true,
    noCalendar: false,
    hourIncrement: 1,
    disableMobile: true,
    inline: false,
    position: "auto",
    appendTo: document.querySelector('#schedule_datetime'),
    onOpen: function(selectedDates, dateStr, instance) {
      const calendar = instance.calendarContainer;
      calendar.style.zIndex = '1000';
    }
  });

  // TinyMCEの初期化
  tinymce.init({
    selector: '#event_content',
    license_key: 'gpl',
    plugins: ['link', 'image', 'code', 'lists'],
    toolbar: 'undo redo | fontfamily | bold italic | bullist numlist | link image | code',
    // font_formats: 'Arial=arial,helvetica,sans-serif; Times New Roman=times new roman,times; Comic Sans MS=comic sans ms,sans-serif;', 
    menubar: false,
    statusbar: false,
    branding: false,
    promotion: false,
    language: 'ja',
    height: 400,
    skin: 'oxide',
    content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif; font-size: 14px; }',
    setup: function(editor) {
      editor.on('init', function() {
        // スキンファイルを動的に読み込む
        const link = document.createElement('link');
        link.rel = 'stylesheet';
        link.href = '/js/tinymce/skins/ui/oxide/skin.min.css';
        document.head.appendChild(link);

        const contentLink = document.createElement('link');
        contentLink.rel = 'stylesheet';
        contentLink.href = '/js/tinymce/skins/content/default/content.min.css';
        document.head.appendChild(contentLink);
      });
    },
    base_url: '/js/tinymce',
    skin_url: '/js/tinymce/skins/ui/oxide',
    content_css: '/js/tinymce/skins/content/default/content.min.css'
  });

});


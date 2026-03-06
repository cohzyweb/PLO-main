
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

// import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
// import { FontFamily, FontSize, FontColor, FontBackgroundColor } from '@ckeditor/ckeditor5-font';
// import ClassicEditor from '@binay7587/ckeditor5-full-free';

// Flatpickrの初期化
document.addEventListener('DOMContentLoaded', function () {
  // 配信設定のラジオボタン制御
  const publishTypeRadios = document.querySelectorAll('input[name="publish_type"]');
  const scheduleDatetime = document.getElementById('schedule_datetime');
  console.log(scheduleDatetime);
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

  // 現在時刻を15分単位で取得
  // const now = new Date();
  // const minutes = Math.ceil(now.getMinutes() / 15) * 15;
  // now.setMinutes(minutes);

  // published_atの値を取得
  const publishedAtInput = document.querySelector('input[name="published_at"]');
  const publishedAtValue = publishedAtInput.value;
  console.log({publishedAtValue});
  // console.log({now});
  const defaultDate = new Date(publishedAtValue);
  const minutes = Math.ceil(defaultDate.getMinutes() / 15) * 15;
  defaultDate.setMinutes(minutes);
  console.log({defaultDate});
  flatpickr(".flatpickr-input", {
    enableTime: true,
    dateFormat: "Y-m-d H:i",
    time_24hr: true,
    minuteIncrement: 15,
    locale: Japanese,
    minDate: "2024-01-01 00:00",
    // defaultDate: publishedAtValue || now,
    defaultDate: defaultDate,
    onChange: function(selectedDates, dateStr) {
      // 15分単位に調整
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
      const input = instance.input;
      const inputRect = input.getBoundingClientRect();
      const scheduleDatetimeRect = scheduleDatetime.getBoundingClientRect();
      calendar.style.zIndex = '1000';
      

    }
  });

  /*
  // TinyMCEの初期化
  tinymce.init({
    selector: '#news_content',
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
  */
 /*
  const editorEl = document.getElementById('news_content');
  if (editorEl) {
    ClassicEditor.create(editorEl, {
      // plugins: [
      //   FontFamily,
      //   FontSize,
      //   FontColor,
      //   FontBackgroundColor,
      // ],
      toolbar: [
        'heading', '|',
        'fontFamily', 'fontSize', '|',
        'fontColor', 'fontBackgroundColor', '|',
        'bold', 'italic', 'underline', '|',
        'link', 'bulletedList', 'numberedList','blockQuote', '|',
        'insertTable', '|',
        'imageUpload', '|',
        'alignment', '|',
        'outdent', 'indent', '|',
        'horizontalLine', '|',
        'codeBlock', '|',
        'mediaEmbed', '|',
        'undo', 'redo'
      ],
      fontFamily: {
        options: [
          'default',
          'Arial, Helvetica, sans-serif',
          'Courier New, Courier, monospace',
          'Georgia, serif',
          'Tahoma, Geneva, sans-serif',
          'Times New Roman, Times, serif',
          'Verdana, Geneva, sans-serif'
        ],
        supportAllValues: true
      },
      fontSize: {
        options: [9, 11, 13, 'default', 17, 19, 21]
      },
      fontColor: {
        colors: [
          { color: '#000000', label: 'Black' },
          { color: '#F00', label: 'Red' },
          { color: '#0F0', label: 'Green' }
        ]
      },
      fontBackgroundColor: {
        colors: [
          { color: '#FFFF00', label: 'Yellow' },
          { color: '#FFA500', label: 'Orange' }
        ]
      }
    })
    .then(editor => { 
      console.log(editor);
    })
    .catch(error => {
      console.error('Error initializing CKEditor:', error);
    });
  }
  */
});


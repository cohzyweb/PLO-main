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

// TinyMCEの初期化
tinymce.init({
  selector: '#fee_content',
  license_key: 'gpl',
  plugins: ['link', 'image', 'code', 'lists'],
  toolbar: 'undo redo | fontfamily | bold italic | bullist numlist | link image | code',
  // font_formats: 'Arial=arial,helvetica,sans-serif; Times New Roman=times new roman,times; Comic Sans MS=comic sans ms,sans-serif;', 
  menubar: false,
  statusbar: false,
  branding: false,
  promotion: false,
  language: 'ja',
  height: 800,
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

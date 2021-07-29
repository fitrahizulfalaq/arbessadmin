<!-- Summernote -->
<script src="<?=base_url()?>/assets/plugins/summernote/summernote-bs4.min.js"></script>
<script>
  $('#summernote').summernote({
  placeholder: 'Ketik disini',
  width: "100%",
  height: "500px",
  onPaste: "false",
  toolbar: [
    // [groupName, [list of button]]
    ['style', ['bold', 'italic', 'underline', 'clear']],
    ['para', ['ul', 'ol']],
    ['mist', ['codeview', 'fullscreen']],
  ]
});
</script>
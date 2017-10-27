
    <!-- BEGIN VENDOR JS -->
    <script src="/theme/assets/plugins/pace/pace.min.js" type="text/javascript"></script>
    <script src="/theme/assets/plugins/jquery/jquery-1.11.1.min.js" type="text/javascript"></script>
    <script src="/theme/assets/plugins/modernizr.custom.js" type="text/javascript"></script>
    <script src="/theme/assets/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="/theme/assets/plugins/tether/js/tether.min.js" type="text/javascript"></script>
    <script src="/theme/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/theme/assets/plugins/jquery/jquery-easy.js" type="text/javascript"></script>
    <script src="/theme/assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
    <script src="/theme/assets/plugins/jquery-ios-list/jquery.ioslist.min.js" type="text/javascript"></script>
    <script src="/theme/assets/plugins/jquery-actual/jquery.actual.min.js"></script>
    <script src="/theme/assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <script type="text/javascript" src="/theme/assets/plugins/select2/js/select2.full.min.js"></script>
    <script type="text/javascript" src="/theme/assets/plugins/classie/classie.js"></script>
    <script src="/theme/assets/plugins/switchery/js/switchery.min.js" type="text/javascript"></script>
    
    <script src="/theme/assets/plugins/skycons/skycons.js" type="text/javascript"></script>
    <!-- END VENDOR JS -->
    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="/theme/pages/js/pages.min.js"></script>
    <!-- END CORE TEMPLATE JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    
    <script src="/theme/assets/js/scripts.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS -->

    
    <!-- <script src="https://unpkg.com/vue-toasted"></script> -->
    
    <script type="text/x-template" id="select2-template">
      <select class="form-control" >
        <slot></slot>
      </select>
    </script>

    <script src="/js/manifest.js"></script>
    <script src="/js/vendor.js"></script>
    <script src="/js/app.js"></script>

    <script>

        // axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        // axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


        Vue.component('select2', {
          props: ['options', 'value'],

          template: '#select2-template',
          mounted: function () {
            var vm = this
            $(this.$el)
              .val(this.value)
              // init select2
              .select2({ data: this.options })
              // emit event on change.
              .on('change', function () {
                vm.$emit('input', this.value)
              })
          },
          watch: {
            value: function (value) {
              // update value
              $(this.$el).val(value)
            },
            options: function (options) {
              // update options
              $(this.$el).select2({ data: options })
            }
          },
          destroyed: function () {
            $(this.$el).off().select2('destroy')
          }
        })
          

    </script>
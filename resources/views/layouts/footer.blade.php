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

    <!-- Vue.js and Axios -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/vue"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    
    <script type="text/x-template" id="select2-template">
      <select class="form-control" >
        <slot></slot>
      </select>
    </script>

    <script type="text/x-template" id="applications-list-template">
      <div class="feed" >
        <div class="day">
          <div class="row">
            <slot></slot>
          </div>
        </div>
      </div>
    </script>

    <script>

        axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
        
        $(document).ready(function() {
            
            $(".sel2").select2();
        });

        Vue.component('applications-list', {

          props: {

            filters: {
                        default: function() { return []; }
                     },
          },

          template: '#applications-list-template',

          mounted: function() {

              // Compare filters
          },

        });

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
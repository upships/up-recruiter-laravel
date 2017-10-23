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

    <script type="text/x-template" id="application-list-item-template">

      <div class="card social-card share full-width" data-social="item">
        <div class="circle" data-toggle="tooltip" title="Label" data-container="body"></div>
        <div class="card-header clearfix">
          <h5 style="font-size: 16px !important;" >
            @{{application.profile.name}} <i class="fa fa-spinner fa-spin" v-show="isLoading" ></i>
          </h5>
          <h6>@{{application.profile.position.label}} 
            <span class="location semi-bold"><i
                class="fa fa-map-marker"></i> @{{application.profile.city}} <span v-html="application.profile.country.icon"></span>
            </span>
          </h6>
        </div>
        <div class="card-description">

          <p v-show="application.remarks" >
            @{{application.remarks}}
          </p>

          <p v-show="application.salary" >
            Pretens&atilde;o salarial: @{{application.salary}}
          </p>

          <div class="row">
            <div class="col" v-if="application.profile.stcw_regulations" >
              <h6>Regras STCW</h6>
              <ul class="list-inline" >
                <li class="list-inline-item" v-for="stcw_regulation in application.profile.stcw_regulations" >
                  <button type="button" class="btn btn-tag btn-tag-rounded btn-xs" >@{{stcw_regulation.stcw_regulation.regulation}}</button>
                </li>
              </ul>
            </div>
            <div class="col" v-if="application.profile.seaman_book_types" >
              <h6>Categorias CIR</h6>
              <ul class="list-inline">
                <li class="list-inline-item" v-for="seaman_book_type in application.profile.seaman_book_types" >
                  <button type="button" class="btn btn-tag btn-tag-rounded btn-xs" >@{{seaman_book_type.seaman_book_type.label}}</button>
                </li>
              </ul>
            </div>
            <div class="col" v-if="application.profile.certificates" >
              <h6>Certificados</h6>
              <ul class="list-inline" >
                <li class="list-inline-item" v-for="certificate in application.profile.certificates" >
                  <button type="button" class="btn btn-tag btn-tag-rounded btn-xs" >@{{certificate.certificate_type.label}}</button>
                </li>
              </ul>
            </div>
          </div>
          <div class="row">
            <div class="col" v-if="application.profile.ships" >
              <h6>Embarcações</h6>
              <ul class="list-inline" >
                <li class="list-inline-item" v-for="ship in application.profile.ships" >
                  <button type="button" class="btn btn-tag btn-tag-rounded btn-xs" >@{{ship.ship_type.label}}</button>
                </li>
              </ul>
            </div>
          </div>
          
        </div>
        <div class="card-content">
        </div>
        <div class="card-footer clearfix">
          
          <ul class="list-inline">
            <li class="list-inline-item" >
              <a class="btn btn-primary btn-sm" href="#" >
                <i class="fa fa-thumbs-up"></i> Pr&eacute;-selecionar
              </a>
            </li>
            <li class="list-inline-item float-right">
              <a href="#" class="btn btn-danger btn-sm" >
                <i class="fa fa-times"></i> Eliminar
              </a>
            </li>
            <li class="list-inline-item" >
              <a :href="'/recruiting/sendMessage/' + application.profile.id" class="btn btn-default btn-sm" title="Enviar e-mail (nova janela)" target="_blank" ><i class="fa fa-envelope-o"></i></a></li>

            <li class="list-inline-item float-right">
              <a :href="'/profile/' + application.profile.id" target="_blank" class="btn btn-default btn-sm" title="Ver perfil (nova janela)" >
              Perfil completo
              </a>
            </li>

          </ul>

        </div>
      </div>
    </script>

    <script type="text/x-template" id="application-list-item-template2"> 

      <div class="card card-default" >
        <div class="card-block">
          <h3>
            @{{application.profile.name}} 
            <i class="fa fa-spinner fa-spin" v-show="isLoading" ></i>
          </h3>

          <h5>
            @{{application.profile.position.label}} &middot;

            @{{application.profile.city}} <span v-html="application.profile.country.icon"></span>
          </h5>

          <p v-show="application.remarks" >
            @{{application.remarks}}
          </p>

          <p v-show="application.salary" >
            Pretens&atilde;o salarial: @{{application.salary}}
          </p>

          <div class="row">
            <div class="col" v-if="application.profile.stcw_regulations" >
              <h6>Regras STCW</h6>
              <ul class="list-inline" >
                <li class="list-inline-item" v-for="stcw_regulation in application.profile.stcw_regulations" >
                  <button type="button" class="btn btn-tag btn-tag-rounded btn-xs" >@{{stcw_regulation.stcw_regulation.regulation}}</button>
                </li>
              </ul>
            </div>
            <div class="col" v-if="application.profile.seaman_book_types" >
              <h6>Categorias CIR</h6>
              <ul class="list-inline">
                <li class="list-inline-item" v-for="seaman_book_type in application.profile.seaman_book_types" >
                  <button type="button" class="btn btn-tag btn-tag-rounded btn-xs" >@{{seaman_book_type.seaman_book_type.label}}</button>
                </li>
              </ul>
            </div>
            <div class="col" v-if="application.profile.certificates" >
              <h6>Certificados</h6>
              <ul class="list-inline" >
                <li class="list-inline-item" v-for="certificate in application.profile.certificates" >
                  <button type="button" class="btn btn-tag btn-tag-rounded btn-xs" >@{{certificate.certificate_type.label}}</button>
                </li>
              </ul>
            </div>
          </div>
          <div class="row">
            <div class="col" v-if="application.profile.ships" >
              <h6>Embarcações</h6>
              <ul class="list-inline" >
                <li class="list-inline-item" v-for="ship in application.profile.ships" >
                  <button type="button" class="btn btn-tag btn-tag-rounded btn-xs" >@{{ship.ship_type.label}}</button>
                </li>
              </ul>
            </div>
          </div>

        </div>
        <div class="card-block">
          <ul class="list-inline">
            <li class="list-inline-item" >
              <a class="btn btn-primary btn-sm" href="#" >
                <i class="fa fa-thumbs-up"></i> Pr&eacute;-selecionar
              </a>
          </li>
          <li class="list-inline-item float-right">
            <a href="#" class="btn btn-danger btn-sm" >
              <i class="fa fa-times"></i> Eliminar
            </a>
          </li>
          <li class="list-inline-item" >
            <a :href="'/recruiting/sendMessage/' + application.profile.id" class="btn btn-default btn-sm" title="Enviar e-mail (nova janela)" target="_blank" ><i class="fa fa-envelope-o"></i></a></li>

          <li class="list-inline-item float-right">
            <a :href="'/profile/' + application.profile.id" target="_blank" class="btn btn-default btn-sm" title="Ver perfil (nova janela)" >
            Perfil completo
            </a>
          </li>

          </ul>
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

            applications: { required: true },
            filters: {
                        default: function() { return []; }
                     },
          },

          template: '#applications-list-template',

          mounted: function() {

              // Compare filters
          },

        });


        Vue.component('application-list-item', {

          props: {
            application: { required: true },
          },
          
          data: function()  {

            return {
              isLoading: false,
            };
          },

          template: '#application-list-item-template',

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
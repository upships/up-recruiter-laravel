<div id="vge-app" >

	<h3>{$job->position->label}</h3>

	<div class="row">

		<div class="col-lg-2" >
			<div class="list-group" >
				<div class="list-group-item">
					<h3 class="list-group-item-heading" >Filtros</h3>
				</div>
				
				<div class="list-group-item" v-if="activeFilters.length > 0">

					<h4>Filtros ativos</h4>

					<ul v-for="(ac, key) in activeFilters" >
						<li>{{filtersMeta[ac.key]['label']}}: {{ac.value}} <a href="#" @click="deleteFilter(key)" >x</a></li>
					</ul>
				</div>

				<div class="list-group-item" v-for="(filter, key) in filters" >
					
					<div v-if="filter.length > 0" >

						<h4 class="" >{{filtersMeta[key]['label']}}</h4>

						<div v-for="item in filter" >
							<a href="#" @click="triggerFilter(key, item)" >
								{{filtersMeta[key][item]['label']}}
							</a>
						</div>

					</div>

				</div>

			</div>
		</div>
		<div class="col-lg-10">						
			<div class="list-group" >
				<div class="list-group-item">
					<h3 class="list-group-item-heading" >Candidatos</h3>
					<p>Total: {{visibleProfiles.length}} candidatos</p>
				</div>

				<div class="list-group-item" v-for="profile in visibleProfiles" >
					{{profile.profileName}} ({{profile.bookCategoryCode}})
				</div>

			</div>
		</div>

	</div>
</div>


<script>

	$(document).ready(function() {
			
			new Vue({

		    el: '#vge-app',
		    data: {

		    	profiles: [],

		        activeFilters: [],

		        filters: 	{
		        				book: [],
		        				location: [],
		        				stcw: [],
		        				english: [],
		        			},

		        filtersMeta: {
		        				book: {

		        					label: 'Categorias CIR',
		        					name: 'book',
		        				},

		        				stcw: {

		        					label: 'STCW',
		        					name: 'stcw',
		        				},

		        				location: {

		        					label: 'Localização',
		        					name: 'location',
		        				},

		        				english: {

		        					label: 'Inglês',
		        					name: 'english',
		        				},

		        				// ships: {
		        				// 	label: 'Embarcação',
		        				// 	name: 'ship',
		        				// 	items: {}
		        				// },
		        			},

		        job_id: {{$job->id}},
		    },

		    watch: {

		        searchParameter: function (val) {

		            // this.flagParameter = null;

		            // var self = this;

		            // this.visibleItems = this.certificates.filter( function(certificate) {

		            //     if(self.searchParameter)   {

		            //         // Search by name

		            //         return certificate.label.toLowerCase().indexOf( self.searchParameter.toLowerCase() ) >= 0;
		            //     }
		                
		            //     else {

		            //         return certificate;
		            //     }
		            // }); 
		        }
		    },

		    computed: {

		        visibleProfiles: function()	{

		        	var self = this;

		        	if(self.activeFilters.length > 0)	{

		        		return self.profiles.filter( function(profile) {

			        		for(i = 0; i < self.activeFilters.length; i++)	{

			        			var ac = self.activeFilters[i];

			        			if(profile['filterableAttributes'][ac.key].findIndex( function(k) {return k === ac.value;}) >= 0)	{

			        				return profile;
			        			}

			        		}

			        	});
		        	}
		        	
		        	return self.profiles;
		        }
		    },

		    filters: {

		    	filterTypeLabel: function( filterType )	{

		    		var self = this;

		    		console.log('This: ' + this.filtersMeta);
		    		console.log('Self: ' + self.filtersMeta);

		    		return filterType;

		    		// var label = this['filtersMeta']['book']['label'];

		    		// return typeof label === 'string' ? label : filterType;
		    	},

		    	filterItemLabel: function (filterItemId, filterType)	{

		    		return this['filtersMeta'][filterType][filterItemId]['label'];
		    	}

		    },

		    beforeMount: function() {

		        const vm = this;

		        axios.get('/api/jobs/applications/' + vm.job_id).then( function( response ) {

		            // Go through each profile, get their filterableAttributes and return to the Filters array

		            var profiles = response.data.items.map( function(profile)	{

		            	profile.filterableAttributes = {book: [], stcw: [], english: [], location: []};

		            	// CIR: book

		            		// Check if item already exists

		            	var filterItemKey = profile.bookCategoryCode;
		            	
		            	if(typeof filterItemKey === 'string')	{

			            	if( vm.filters.book.findIndex( function(item) {return item === filterItemKey}) < 0)	{

			            		vm['filtersMeta']['book'][filterItemKey] = {label: profile.bookCategoryCode, id: profile.bookCategoryId};
			            		vm.filters.book.push(filterItemKey);
			            	}

			            	profile.filterableAttributes.book.push(filterItemKey);
			            }

			            var filterItemKey = profile.profileState;
		            	
		            	if(typeof filterItemKey === 'string')	{

			            	if( vm.filters.location.findIndex( function(item) {return item === filterItemKey}) < 0)	{

			            		vm['filtersMeta']['location'][filterItemKey] = {label: profile.profileState, id: profile.profileState};
			            		vm.filters.location.push(filterItemKey);
			            	}

			            	profile.filterableAttributes.location.push(filterItemKey);
			            }

			            // STCW: stcw

		            	if(typeof profile.cocRegulations !== 'undefined')	{
			            	
			            	profile.cocRegulations.map( function(regulation) {

				            	var filterItemKey = regulation.stcwRegulationCode;
		            	
				            	if(typeof filterItemKey === 'string')	{

					            	if( vm.filters.stcw.findIndex( function(item) {return item === filterItemKey}) < 0)	{

					            		vm['filtersMeta']['stcw'][filterItemKey] = {label: regulation.stcwRegulation, id: regulation.stcwRegulationCode};
					            		vm.filters.stcw.push(filterItemKey);
					            	}
					            }

					            profile.filterableAttributes.stcw.push(filterItemKey);

			            	});
			            }

			            // Inglês: english

			            	var filterItemKey = profile.profileEnglishLevel;
		            	
			            	if(typeof filterItemKey === 'string')	{

				            	if( vm.filters.english.findIndex( function(item) {return item === filterItemKey}) < 0)	{

				            		vm['filtersMeta']['english'][filterItemKey] = {label: profile.profileEnglishLevelLabel, id: filterItemKey};
				            		vm.filters.english.push(filterItemKey);
				            	}

				            	profile.filterableAttributes.english.push(filterItemKey);
				            }

				        return profile;
		            	
		            	// Embarcação: ship

		            	// if(typeof item.workExperience !== 'undefined')	{

		            	// 	item.workExperience.map( function(work) {

		            	// 		if(typeof work.workShips !== 'undefined')	{
			            // 			work.workShips.map( function(ship) {

			            // 				key = ship.workShipTypeName;

			            // 				if(typeof key !== 'undefined' && typeof vm['filters']['ship']['items'][key] === 'undefined' && key.length > 0)	{

					          //   		//console.log('State key: ' + item.profileState + ' | ' + key);

					          //   		vm['filters']['ship']['items'][key] = 	{
				           //  														label: ship.workShipTypeLabel,
				           //  														id: ship.workShipTypeName,
					          //   												};
					          //   		}

			            // 			});
			            // 		}
			            // 	});
		            	// }

		            });

		            vm.profiles = profiles;
		        });
		    },

		    mounted: function()	{

		    },

		    methods: {

		        deleteFilter: function(key)	{

		        	this.activeFilters.splice(key, 1);
		        },

		        triggerFilter: function(key, value)	{

		    		this.activeFilters.push({key: key, value: value});
		    	},
		    }

		});

	});

</script>
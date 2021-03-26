( function ( $ ) {

	var charts = {
		init: function () {
			// -- Set new default font family and font color to mimic Bootstrap's default styling
			Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
			Chart.defaults.global.defaultFontColor = '#292b2c';

			this.ajaxGetProcessItemsMonthlyData();
			this.ajaxGetProcessItemsTypeData();
			this.ajaxGetProcessItemsAssignedOrganizationData();

			this.ajaxGetTreeRemovalsMonthlyData();
			this.ajaxGetTreeRemovalProvincesData();
			this.ajaxGetTreeRemovalDistrictsData();

		},

		ajaxGetProcessItemsMonthlyData: function () {
			var request = $.ajax( {
				method: 'GET',
				url: 'get-processItem-chart-data'
			} );

			request.done( function ( response ) {
				console.log( response );
				charts.createProcessItemsChart( response );
			});
		},

		/**
		 * Created the Process Items Chart
		 */
		createProcessItemsChart: function ( response ) {

			var ctx = document.getElementById("myAreaChart");
			var myLineChart = new Chart(ctx, {
				type: 'line',
				data: {
					labels: response.months_years, // The response got from the ajax request containing all month names in the database
					datasets: [{
						label: "Requests",
						lineTension: 0.3,
						backgroundColor: "#0275d8",	
						borderColor: "rgba(2,117,216,1)",
						pointRadius: 5,
						pointBackgroundColor: "rgba(2,117,216,1)",
						pointBorderColor: "rgba(255,255,255,0.8)",
						pointHoverRadius: 5,
						pointHoverBackgroundColor: "rgba(2,117,216,1)",
						pointHitRadius: 20,
						pointBorderWidth: 2,
						data: response.process_item_count_data // The response got from the ajax request containing data for the completed jobs in the corresponding months
					}],
				},
				options: {
					scales: {
						xAxes: [{
							time: {
								unit: 'date'
							},
							gridLines: {
								display: false
							},
							ticks: {
								maxTicksLimit: 7
							}
						}],
						yAxes: [{
							label:"No. of Process Items",
							ticks: {
								min: 0,
								max: response.max, // The response got from the ajax request containing max limit for y axis
								maxTicksLimit: 5
							},
							gridLines: {
								color: "rgba(0, 0, 0, .125)",
							}
						}],
					},
					title:{
						display:true,
						text:'REQUESTS MADE WITHIN THE LAST 5 MONTHS',
						position:'top'
					},
					legend: {
						display: true
					}
				}
			});
		},




		ajaxGetProcessItemsTypeData: function () {
			var request = $.ajax( {
				method: 'GET',
				url: 'get-processItem-formType-chart-data'
			} );

			request.done( function ( response ) {
				console.log( response );
				charts.createProcessItemsTypesChart( response );
			});
		},

		/**
		 * Created the Process Items Types bar Chart
		 */
		createProcessItemsTypesChart: function ( response ) {

			var ctx = document.getElementById("processItemTypeChart");
			var myLineChart = new Chart(ctx, {
				type: 'bar',
				data: {
					labels: response.form_type, // The response got from the ajax request containing all month names in the database
					datasets: [{
						label: "Requests",
						lineTension: 0.3,
						backgroundColor: "#0275d8",	
						borderColor: "rgba(2,117,216,1)",
						pointRadius: 5,
						pointBackgroundColor: "rgba(2,117,216,1)",
						pointBorderColor: "rgba(255,255,255,0.8)",
						pointHoverRadius: 5,
						pointHoverBackgroundColor: "rgba(2,117,216,1)",
						pointHitRadius: 20,
						pointBorderWidth: 2,
						data: response.process_item_type_count_data // The response got from the ajax request containing data 
					}],
				},
				options: {
					scales: {
						xAxes: [{
							time: {
								unit: 'date'
							},
							gridLines: {
								display: false
							},
							ticks: {
								maxTicksLimit: 7
							}
						}],
						yAxes: [{
							label:"No. of Process Items",
							ticks: {
								min: 0,
								max: response.max, // The response got from the ajax request containing max limit for y axis
								maxTicksLimit: 5
							},
							gridLines: {
								color: "rgba(0, 0, 0, .125)",
							}
						}],
					},
					title:{
						display:true,
						text:'NUMBER OF REQUESTS MADE OF EACH TYPE',
						position:'top'
					},
					legend: {
						display: true
					}
				}
			});
		},



		ajaxGetProcessItemsAssignedOrganizationData: function () {
			var request = $.ajax( {
				method: 'GET',
				url: 'get-processItem-assignedOrganization-chart-data'
			} );

			request.done( function ( response ) {
				console.log( response );
				charts.createProcessItemsOrganizationChart( response );
			});
		},

		/**
		 * Created the Process Items Assigned Organization Chart
		 */
		 createProcessItemsOrganizationChart: function ( response ) {

			var ctx = document.getElementById("AssignedOrganizationChart");
			var myLineChart = new Chart(ctx, {
				type: 'pie',
				data: {
					labels: response.organization_name, // The response got from the ajax request containing all month names in the database
					datasets: [{
						backgroundColor: ['#0275d8','#5cb85c','#5bc0de','#f0ad4e','#d9534f'],	
						pointRadius: 5,
						pointBackgroundColor: "rgba(2,117,216,1)",
						pointBorderColor: "rgba(255,255,255,0.8)",
						pointHoverRadius: 9,
						pointHoverBackgroundColor: "rgba(2,117,216,1)",
						pointHitRadius: 20,
						pointBorderWidth: 2,
						data: response.process_item_activity_organization_count_data // The response got from the ajax request containing data 
					}],
				},
				options: {
					title:{
						display:true,
						text:'THE ORGANIZATION ASSIGNED TO EACH REQUEST',
						position:'top'
					},
					legend: {
						display: true
					},
					rotation: -0.7 * Math.PI
				}
			});
		},





		ajaxGetTreeRemovalsMonthlyData: function () {
			var request = $.ajax( {
				method: 'GET',
				url: 'get-treeRemoval-chart-data'
			} );

			request.done( function ( response ) {
				console.log( response );
				charts.createTreeRemovalsChart( response );
			});
		},

		/**
		 * Created the Tree Removals Line Chart
		 */
		 createTreeRemovalsChart: function ( response ) {

			var ctx = document.getElementById("TreeRemovalAreaChart");
			var myLineChart = new Chart(ctx, {
				type: 'line',
				data: {
					labels: response.months_years, // The response got from the ajax request containing all month names in the database
					datasets: [{
						label: "Tree Removals",
						lineTension: 0.3,
						backgroundColor: "#0275d8",	
						borderColor: "rgba(2,117,216,1)",
						pointRadius: 5,
						pointBackgroundColor: "rgba(2,117,216,1)",
						pointBorderColor: "rgba(255,255,255,0.8)",
						pointHoverRadius: 5,
						pointHoverBackgroundColor: "rgba(2,117,216,1)",
						pointHitRadius: 20,
						pointBorderWidth: 2,
						data: response.tree_removal_count_data // The response got from the ajax request containing data for the completed jobs in the corresponding months
					}],
				},
				options: {
					scales: {
						xAxes: [{
							time: {
								unit: 'date'
							},
							gridLines: {
								display: false
							},
							ticks: {
								maxTicksLimit: 7
							}
						}],
						yAxes: [{
							label:"No. of Tree Removals Requested for",
							ticks: {
								min: 0,
								max: response.max, // The response got from the ajax request containing max limit for y axis
								maxTicksLimit: 5
							},
							gridLines: {
								color: "rgba(0, 0, 0, .125)",
							}
						}],
					},
					legend: {
						display: true
					}
				}
			});
		},



		ajaxGetTreeRemovalProvincesData: function () {
			var request = $.ajax( {
				method: 'GET',
				url: 'get-treeRemoval-province-chart-data'
			} );

			request.done( function ( response ) {
				console.log( response );
				charts.createTreeRemovalProvincesChart( response );
			});
		},

		/**
		 * Created the Tree Removals per Province Chart
		 */
		 createTreeRemovalProvincesChart: function ( response ) {

			var ctx = document.getElementById("ProvinceTreeRemovalPieChart");
			var myLineChart = new Chart(ctx, {
				type: 'pie',
				data: {
					labels: response.province, // The response got from the ajax request containing all month names in the database
					datasets: [{
						backgroundColor: ['#0275d8','#5cb85c','#5bc0de','#f0ad4e','#d9534f','#9933CC','#2BBBAD','#007E33','#FF8800'],	
						pointRadius: 5,
						pointBackgroundColor: "rgba(2,117,216,1)",
						pointBorderColor: "rgba(255,255,255,0.8)",
						pointHoverRadius: 9,
						pointHoverBackgroundColor: "rgba(2,117,216,1)",
						pointHitRadius: 20,
						pointBorderWidth: 2,
						data: response.tree_removal_province_count_data // The response got from the ajax request containing data 
					}],
				},
				options: {
					title:{
						display:true,
						text:'TREE REMOVALS PER PROVINCE',
						position:'top'
					},
					legend: {
						display: true
					},
					rotation: -0.7 * Math.PI
				}
			});
		},

        ajaxGetTreeRemovalDistrictsData: function () {
            var request = $.ajax( {
                method: 'GET',
                url: 'get-treeRemoval-district-chart-data'
            } );

            request.done( function ( response ) {
                console.log( response );
                charts.createTreeRemovalDistrictsChart( response );
            });
        },

        /**
         * Created the Tree Removals per District Chart
         */
         createTreeRemovalDistrictsChart: function ( response ) {

            var ctx = document.getElementById("DistrictTreeRemovalPieChart");
            var myLineChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: response.district, // The response got from the ajax request containing all month names in the database
                    datasets: [{
                        backgroundColor: ['#0275d8','#5cb85c','#5bc0de','#f0ad4e','#d9534f','#9933CC','#2BBBAD','#007E33','#FF8800'],   
                        pointRadius: 5,
                        pointBackgroundColor: "rgba(2,117,216,1)",
                        pointBorderColor: "rgba(255,255,255,0.8)",
                        pointHoverRadius: 9,
                        pointHoverBackgroundColor: "rgba(2,117,216,1)",
                        pointHitRadius: 20,
                        pointBorderWidth: 2,
                        data: response.tree_removal_district_count_data // The response got from the ajax request containing data 
                    }],
                },
                options: {
                    title:{
                        display:true,
                        text:'TREE REMOVALS PER DISTRICT',
                        position:'top'
                    },
                    legend: {
                        display: true
                    },
                    rotation: -0.7 * Math.PI
                }
            });
        }


		
	};

	charts.init();

} )( jQuery );
var map;
var geocoder;



function initMap() {
		   var minZoomLevel = 13;
		 var styledMapType = new google.maps.StyledMapType(
            [
              {elementType: 'geometry', stylers: [{color: '#ebe3cd'}]},
              {elementType: 'labels.text.fill', stylers: [{color: '#523735'}]},
              {elementType: 'labels.text.stroke', stylers: [{color: '#f5f1e6'}]},
              {
                featureType: 'administrative',
                elementType: 'geometry.stroke',
                stylers: [{color: '#c9b2a6'}]
              },
              {
                featureType: 'administrative.land_parcel',
                elementType: 'geometry.stroke',
                stylers: [{color: '#dcd2be'}]
              },
              {
                featureType: 'administrative.land_parcel',
                elementType: 'labels.text.fill',
                stylers: [{color: '#ae9e90'}]
              },
              {
                featureType: 'landscape.natural',
                elementType: 'geometry',
                stylers: [{color: '#dfd2ae'}]
              },
              {
                featureType: 'poi',
                elementType: 'geometry',
                stylers: [{color: '#dfd2ae'}]
              },
              {
                featureType: 'poi',
                elementType: 'labels.text.fill',
                stylers: [{color: '#93817c'}]
              },
              {
                featureType: 'poi.park',
                elementType: 'geometry.fill',
                stylers: [{color: '#a5b076'}]
              },
              {
                featureType: 'poi.park',
                elementType: 'labels.text.fill',
                stylers: [{color: '#447530'}]
              },
              {
                featureType: 'road',
                elementType: 'geometry',
                stylers: [{color: '#f5f1e6'}]
              },
              {
                featureType: 'road.arterial',
                elementType: 'geometry',
                stylers: [{color: '#fdfcf8'}]
              },
              {
                featureType: 'road.highway',
                elementType: 'geometry',
                stylers: [{color: '#f8c967'}]
              },
              {
                featureType: 'road.highway',
                elementType: 'geometry.stroke',
                stylers: [{color: '#e9bc62'}]
              },
              {
                featureType: 'road.highway.controlled_access',
                elementType: 'geometry',
                stylers: [{color: '#e98d58'}]
              },
              {
                featureType: 'road.highway.controlled_access',
                elementType: 'geometry.stroke',
                stylers: [{color: '#db8555'}]
              },
              {
                featureType: 'road.local',
                elementType: 'labels.text.fill',
                stylers: [{color: '#806b63'}]
              },
              {
                featureType: 'transit.line',
                elementType: 'geometry',
                stylers: [{color: '#dfd2ae'}]
              },
              {
                featureType: 'transit.line',
                elementType: 'labels.text.fill',
                stylers: [{color: '#8f7d77'}]
              },
              {
                featureType: 'transit.line',
                elementType: 'labels.text.stroke',
                stylers: [{color: '#ebe3cd'}]
              },
              {
                featureType: 'transit.station',
                elementType: 'geometry',
                stylers: [{color: '#dfd2ae'}]
              },
              {
                featureType: 'water',
                elementType: 'geometry.fill',
                stylers: [{color: '#b9d3c2'}]
              },
              {
                featureType: 'water',
                elementType: 'labels.text.fill',
                stylers: [{color: '#92998d'}]
              }
            ],
            {name: 'Styled Map'});
     
      map = new google.maps.Map(document.getElementById('map-container'), {
     zoom: minZoomLevel,
	 maxZoom: 16,
     center: new google.maps.LatLng(13.462936, 123.646111),
		
         mapTypeIds: [ 'hybrid','styled_map']
        });
		
		
		
 google.maps.event.addListener(map, 'zoom_changed', function () {
     if (map.getZoom() < minZoomLevel) map.setZoom(minZoomLevel);
 });
        // Define the LatLng coordinates for the polygon's path.
   
 // Bounds for Tiwi
 var Restrictmap = new google.maps.LatLngBounds(
     new google.maps.LatLng(13.397254, 123.580387),//southwest corner of a certain area
 new google.maps.LatLng(13.536483,123.675487)   //northeast corner of a certain area

);


var EqualtoBound = map.getCenter(); //This is just a variable that collects the center of the map each time you stop dragging the map with the mouse

google.maps.event.addListener(map, 'center_changed', function() {
    if (Restrictmap.contains(map.getCenter())) {
        EqualtoBound  = map.getCenter();
        return; 
    }

    // on the hand, if the center is no longer within your allowed bounds, then return it to the last valid position
    map.panTo(EqualtoBound );
});
   var PolyBarangays = [
  [
    [{
      "lat": 13.435015,
      "lng": 123.663554
    }, {
      "lat":  13.426654,
      "lng": 123.666289
    }, {
      "lat": 13.432920,
      "lng": 123.702618
    },
	{
      "lat": 13.446135,
      "lng": 123.698785
    }], {
      "color": "white",
      "brgy": " Barangay Name: Nagas,Tiwi, Albay"  
    }
  ],
   [
    [{
      "lat": 13.443860,
      "lng": 123.661610
    },{
      "lat": 13.438350,
      "lng": 123.662210
    },{
      "lat": 13.435004,
      "lng": 123.663573
    },{
      "lat": 13.439881,
      "lng": 123.678114
    },{
      "lat": 13.443104,
      "lng": 123.676770
    },{
      "lat": 13.444953,
      "lng": 123.676829
    }, {
      "lat": 13.450105,
      "lng": 123.672880
    }, {
      "lat": 13.449146,
      "lng": 123.669827
    }, {
      "lat": 13.447174,
      "lng": 123.668000
    }], {
      "color": "white",
      "brgy": "Barangay Name: Belen,Tiwi"
    }
  ],
   [
    [{
      "lat": 13.452159,
      "lng": 123.681004
    },{
      "lat": 13.450349,
      "lng": 123.676598
    },{
      "lat": 13.450099,
      "lng": 123.672878
    }, {
      "lat": 13.444918,
      "lng": 123.676802
    }, {
      "lat": 13.443071,
      "lng": 123.676735
    }, {
      "lat": 13.445574,
      "lng": 123.682870
    }], {
      "color": "white",
      "brgy": "Barangay Name: Coro-coro,Tiwi"
    }
  ],
  [
    [{
      "lat": 13.453661,
      "lng": 123.684864
    },{
      "lat": 13.452137,
      "lng": 123.680984
    },{
      "lat": 13.445574,
      "lng": 123.682846
    }, {
      "lat": 13.443091,
      "lng": 123.676721
    }, {
      "lat": 13.439871,
      "lng": 123.678070
    }, {
      "lat": 13.446112,
      "lng": 123.698795
    },{
      "lat": 13.451709,
      "lng": 123.695693
    },{
      "lat": 13.455644,
      "lng": 123.689035
    },{
      "lat": 13.455915,
      "lng": 123.687544
    }], {
      "color": "white",
      "brgy": "Barangay Name: Gajo,Tiwi"
    }
  ],[
    [{
      "lat": 13.454103,
      "lng": 123.664137
    },{
      "lat": 13.447124,
      "lng": 123.668042
    },{
      "lat": 13.449100,
      "lng": 123.669861
    },{
      "lat": 13.450096,
      "lng": 123.672872
    },{
      "lat": 13.450327,
      "lng": 123.676606
    },{
      "lat": 13.452338,
      "lng": 123.675352
    }, {
      "lat": 13.452694,
      "lng": 123.676393
    }, {
      "lat": 13.455004,
      "lng": 123.676477
    }, {
      "lat": 13.456802,
      "lng": 123.675573
    }], {
      "color": "white",
      "brgy": "Barangay Name: Libtong,Tiwi"
    }
  ],[
    [{
      "lat": 13.455011,
      "lng": 123.676453
    },{
      "lat": 13.452715,
      "lng": 123.676380
    },{
      "lat": 13.452329,
      "lng": 123.675333
    }, {
      "lat": 13.450322,
      "lng": 123.676588
    }, {
      "lat": 13.451576,
      "lng": 123.679568
    }, {
      "lat": 13.455482,
      "lng": 123.679094
    }], {
      "color": "white",
      "brgy": "Barangay Name: Oyama,Tiwi"
    }
  ],[
    [{
      "lat": 13.460212,
      "lng": 123.675994
    },{
      "lat": 13.456786,
      "lng": 123.675484
    },{
      "lat": 13.455011,
      "lng": 123.676453
    },{
      "lat": 13.455482,
      "lng": 123.679094
    }, {
      "lat": 13.451656,
      "lng": 123.679686
    }, {
      "lat": 13.453763,
      "lng": 123.684933
    }, {
      "lat": 13.462353,
      "lng": 123.681043
    }], {
      "color": "white",
      "brgy": "Barangay Name: Tigbi,Tiwi"
    }
  ],[
    [{
      "lat": 13.463436,
      "lng": 123.683585
    },{
      "lat": 13.462353,
      "lng": 123.681043
    },{
      "lat": 13.453653,
      "lng": 123.684891
    }, {
      "lat": 13.455928,
      "lng": 123.687530
    }, {
      "lat": 13.457493,
      "lng": 123.686961
    }], {
      "color": "white",
      "brgy": "Barangay Name: Baybay,Tiwi"
    }
  ],[
    [{
      "lat": 13.459765,
      "lng": 123.668572
    },{
      "lat": 13.456746,
      "lng": 123.675558
    },{
      "lat": 13.460057,
      "lng": 123.676101
    }, {
      "lat": 13.463252,
      "lng": 123.675024
    }], {
      "color": "white",
      "brgy": "Barangay Name: Libjo,Tiwi"
    }
  ],[
    [{
      "lat": 13.466074,
      "lng": 123.658509
    },{
      "lat": 13.459775,
      "lng": 123.668569
    },{
      "lat": 13.463251,
      "lng": 123.675038
    },{
      "lat": 13.471052,
      "lng": 123.672137
    }, {
      "lat": 13.471762,
      "lng": 123.664500
    }], {
      "color": "white",
      "brgy": "Barangay Name: Cararayan,Tiwi"
    }
  ],[
    [{
      "lat": 13.473762,
      "lng": 123.678834
    },{
      "lat": 13.471039,
      "lng": 123.672128
    },{
      "lat": 13.460049,
      "lng": 123.676083
    },{
      "lat": 13.463476,
      "lng": 123.683596
    },{
      "lat": 13.467696,
      "lng": 123.682619
    },{
      "lat": 13.469783,
      "lng": 123.682630
    },{
      "lat": 13.471254,
      "lng": 123.679926
    }], {
      "color": "white",
      "brgy": "Barangay Name: Bolo,Tiwi"
    }
  ],[
    [{
      "lat": 13.478600,
      "lng": 123.665018
    },{
      "lat": 13.471785,
      "lng": 123.664491
    },{
      "lat": 13.471072,
      "lng": 123.672122
    },{
      "lat": 13.473775,
      "lng": 123.678863
    },{
      "lat": 13.475048,
      "lng": 123.678423
    },{
      "lat": 13.476363,
      "lng": 123.678326
    },{
      "lat": 13.477980,
      "lng": 123.677307
    },{
      "lat": 13.479211,
      "lng": 123.675344
    },{
      "lat": 13.479554,
      "lng": 123.675327
    },{
      "lat": 13.479824,
      "lng": 123.674819
    },{
      "lat": 13.479510,
      "lng": 123.669310
    },{
      "lat": 13.479412,
      "lng": 123.667106
    }], {
      "color": "white",
      "brgy": "Barangay Name: Putsan,Tiwi"
    }
  ],[
    [{
      "lat": 13.481361,
      "lng": 123.656183
    },{
      "lat": 13.474465,
      "lng": 123.653732
    },{
      "lat": 13.473354,
      "lng": 123.653500
    },{
      "lat": 13.473023,
      "lng": 123.651073
    },{
      "lat": 13.472408,
      "lng": 123.649860
    },{
      "lat": 13.467124,
      "lng": 123.652844
    },{
      "lat": 13.466071,
      "lng": 123.658625
    },{
      "lat": 13.471797,
      "lng": 123.664511
    },{
      "lat": 13.478585,
      "lng": 123.665078
    },{
      "lat": 13.480445,
      "lng": 123.660397
    },{
      "lat": 13.480028,
      "lng": 123.659163
    },{
      "lat": 13.480100,
      "lng": 123.658329
    }], {
      "color": "white",
      "brgy": "Barangay Name: Naga,Tiwi"
    }
  ],[
    [{
      "lat": 13.484170,
      "lng": 123.639728
    },{
      "lat": 13.479372,
      "lng": 123.638007
    },{
      "lat": 13.478706,
      "lng": 123.637026
    },{
      "lat": 13.475421,
      "lng": 123.646429
    },{
      "lat": 13.472408,
      "lng": 123.649860
    },{
      "lat": 13.473113,
      "lng": 123.651079
    },{"lat": 13.473354,
      "lng": 123.653500
  },{
      "lat": 13.480909,
      "lng": 123.655656
    },{
      "lat": 13.482096,
      "lng": 123.653875
    },{
      "lat": 13.485368,
      "lng": 123.642136
    }], {
      "color": "white",
      "brgy": "Barangay Name: Sogod,Tiwi"
    }
  ],[
  
    [{
      "lat": 13.5232868,
      "lng": 123.600772
    },{
      "lat": 13.520060,
      "lng": 123.552948
    },{
      "lat": 13.513147,
      "lng": 123.547931
    },{
      "lat": 13.505161,
      "lng": 123.543075
    },{
      "lat": 13.498377,
      "lng": 123.542821
    },{
      "lat": 13.516007,
      "lng":  123.604125
    }], {
      "color": "white",
      "brgy": "Barangay Name: Mayong,Tiwi"
    }
  ],[
  
    [{
      "lat": 13.516184,
      "lng":  123.604231
    },{
      "lat": 13.498218,
      "lng": 123.543055
    },{
      "lat": 13.493642,
      "lng": 123.545170
    },{
      "lat": 13.486328,
      "lng": 123.545920
    },{
      "lat": 13.484787,
      "lng": 123.547221
    },{
      "lat": 13.509203,
      "lng":  123.610797
    }], {
      "color": "white",
      "brgy": "Barangay Name: Dap-Dap,Tiwi"
    }
  ],[
  
    [{
      "lat": 13.509290,
      "lng":  123.610617
    },{
      "lat": 13.484730,
      "lng": 123.547242
    },{
      "lat": 13.476713,
      "lng": 123.550736
    },{
      "lat": 13.472673,
      "lng": 123.554023
    },{
      "lat": 13.501687,
      "lng": 123.616729
    }], {
      "color": "white",
      "brgy": "Barangay Name: Misibis,Tiwi"
    }
  ],[
  
    [{
      "lat": 13.501635,
      "lng": 123.616625
    },{
      "lat": 13.472665,
      "lng": 123.554015
    },{
      "lat": 13.464293,
      "lng": 123.564648
    },{
      "lat": 13.494868,
      "lng": 123.620550
    }], {
      "color": "white",
      "brgy": "Barangay Name: Maynonong,Tiwi"
    }
  ],[
  
    [{
      "lat": 13.494868,
      "lng": 123.620550
    },{
      "lat": 13.464293,
      "lng": 123.564648
    },{
      "lat": 13.456316,
      "lng": 123.575567
    },{
      "lat": 13.490544,
      "lng": 123.628154
    },{
      "lat": 13.493140,
      "lng": 123.623099
    }], {
      "color": "white",
      "brgy": "Barangay Name: Joroan,Tiwi"
    }
  ],[
  
    [{
      "lat": 13.490544,
      "lng": 123.628154
    },{
      "lat": 13.472252,
      "lng": 123.600141
    },{
      "lat": 13.456316,
      "lng": 123.575567
    },{
      "lat": 13.449494,
      "lng":  123.581426
    },{
      "lat": 13.487424,
      "lng": 123.636460
    },{
      "lat": 13.487673,
      "lng": 123.634240
    },{
      "lat": 13.489609,
      "lng": 123.633058
    },{
      "lat": 13.489882,
      "lng": 123.629405
    }], {
      "color": "white",
      "brgy": "Barangay Name: Bariis,Tiwi"
    }
  ],[
  
    [{
      "lat": 13.487387,
      "lng": 123.636318
    },{
      "lat": 13.449563,
      "lng": 123.581400
    },{
      "lat": 13.439924,
      "lng": 123.585154
    },{
      "lat": 13.475448,
      "lng": 123.635621
    },{
      "lat": 13.476180,
      "lng": 123.635657
    },{
      "lat": 13.478721,
      "lng": 123.636924
    },{
      "lat": 13.479362,
      "lng": 123.637981
    },{
      "lat": 13.484233,
      "lng": 123.639691
    }], {
      "color": "white",
      "brgy": "Barangay Name: Matalibong,Tiwi"
    }
  ],[
  
    [{
      "lat": 13.478707,
      "lng": 123.636959
    },{
      "lat": 13.476162,
      "lng": 123.635620
    },{
      "lat": 13.475412,
      "lng": 123.635625
    },{
      "lat": 13.439785,
      "lng": 123.585089
    },{
      "lat": 13.432968,
      "lng": 123.586782
    },{
      "lat": 13.462001,
      "lng": 123.654361
    },{
      "lat": 13.462051,
      "lng": 123.656608
    },{
      "lat": 13.466079,
      "lng": 123.658590
    },{
      "lat": 13.467124,
      "lng": 123.652844
    },{
      "lat": 13.472449,
      "lng": 123.649862
    },{
      "lat": 13.475297,
      "lng": 123.646486
    }], {
      "color": "white",
      "brgy": "Barangay Name: Cale,Tiwi"
    }
  ],[
  
    [{
      "lat": 13.466097,
      "lng": 123.658516
    },{
      "lat": 13.462016,
      "lng": 123.656606
    },{
      "lat": 13.461862,
      "lng": 123.654438
    },{
      "lat": 13.432961,
      "lng": 123.586746
    },{
      "lat": 13.427489,
      "lng": 123.588956
    },{
      "lat": 13.423173,
      "lng": 123.588164
    },{
      "lat": 13.454165,
      "lng": 123.664172
    },{
      "lat": 13.456822,
      "lng": 123.675541
    },{
      "lat": 13.459800,
      "lng": 123.668536
    }], {
      "color": "white",
      "brgy": "Barangay Name: Biyong,Tiwi"
    }
  ],[
  
    [{
      "lat": 13.454233,
      "lng": 123.663960
    },{
      "lat": 13.423188,
      "lng": 123.588134
    },{
      "lat": 13.409740,
      "lng": 123.584771
    },{
      "lat": 13.438390,
      "lng": 123.662228
    },{
      "lat": 13.443937,
      "lng": 123.661653
    },{
      "lat": 13.447216,
      "lng": 123.668027
    }], {
      "color": "white",
      "brgy": "Barangay Name: Bagumbayan,Tiwi"
    }
  ],[
  
    [{
      "lat": 13.438586,
      "lng": 123.662083
    },{
      "lat": 13.409779,
      "lng":  123.584800
    },{
      "lat": 13.396491,
      "lng": 123.582520
    },{
      "lat": 13.416772,
      "lng": 123.642567
    },{
      "lat": 13.421294,
      "lng": 123.650288
    },{
      "lat": 13.426706,
      "lng": 123.666308
    }], {

      "color": "white",
      "brgy": "Barangay Name: San Bernardo,Tiwi"
    }
  ],[
    [{
      "lat":  13.43357707297545,
      "lng":  123.6810564994812
    }, { 
      "lat":   13.431823937172318,
      "lng": 123.67972612380981
     
    }, {
      "lat":  13.431156072544109,
      "lng": 123.68221521377563
      
    },
  {   "lat":  13.431740454195461,
      "lng":  123.68315935134886
      
    },
  {   "lat":  13.43357707297545,
      "lng": 123.6810564994812
      
    }], {
      "color": "green",
      "brgy": " This area of Nagas,Tiwi, Albay Purok 3 is not safe"  
    }
  ],[
    [{
      "lat":   13.433764908194453,
      "lng":   123.67410421371459
    }, { 
      "lat": 13.434537118105043,
      "lng": 123.672194480896
     
    }, {
      "lat":   13.433117919598686,
      "lng": 123.67047786712645
      
    },
  {   "lat":  13.431782195687521,
      "lng":  123.67223739624022
      
    },
  {   "lat":  13.433723167047381,
      "lng": 123.67397546768187
      
    },
  {   "lat": 13.433764908194453,
      "lng":  123.67410421371459
      
    }], {
      "color": "green",
      "brgy": " This area of Nagas,Tiwi, Albay Purok 4 is not safe"  
    }
  ],[
    [{
      "lat":  13.433076178339023,
      "lng":  123.67579936981203
    }, { 
      "lat": 13.431552617391333,
      "lng": 123.67408275604248
     
    }, {
      "lat":  13.430947364466524,
      "lng": 123.6765933036804
      
    },
  {   "lat":  13.43257528265673,
      "lng":  123.67734432220459
      
    },
  {   "lat":  13.433076178339023,
      "lng": 123.67579936981203
      
    }], {
      "color": "green",
      "brgy": " This area ofNagas,Tiwi, Albay Purok 5 is not safe"  
    }
  ],[
    [{
      "lat":  13.441820813574475,
      "lng": 123.69064807891846
    }, { 
      "lat": 13.436540678171545,
      "lng": 123.69034767150879
     
    }, {
      "lat":  13.436457196836274,
      "lng": 123.69517564773561
    },
  {   "lat":    13.437855505368837,
      "lng":  123.6971926689148
      
    },
  {   "lat":   13.44017208812771,
      "lng": 123.69629144668578
      
    }, {
      "lat":  13.442279950288006,
      "lng":   123.69573354721068
      
    },
  {   "lat":  13.444346054615977,
      "lng":   123.69264364242554
      
    },
  {   "lat":  13.441820813574475,
      "lng": 123.69064807891846
      
    }], {
      "color": "green",
      "brgy": " This area of Nagas,Tiwi, Albay Purok 6 is not safe"  
    }
  ],[
    [{
      "lat":   13.453236360909765,
      "lng":  123.68717193603516
    }, { 
      "lat": 13.448895595292827,
      "lng": 123.68433952331544
     
    }, {
      "lat":  13.443553006575867,
      "lng": 123.69051933288574
      
    },
  {   "lat":  13.447810391599658,
      "lng":  123.69558334350586
      
    },
  {   "lat":  13.453236360909765,
      "lng": 123.68717193603516
      
    }], {
      "color": "green",
      "brgy": " This area of  Gajo,Tiwi, Albay Purok 3 is not safe"  
    }
  ],[
    [{
      "lat":   13.434787564028653,
      "lng":   123.65610122680664
    }, { 
      "lat": 13.429695112188552,
      "lng":  123.65412712097168
     
    }, {
      "lat":    13.425771346067313,
      "lng": 123.66004943847656
      
    },
  {   "lat":  13.434787564028653,
      "lng":  123.65610122680664
      
    }], {
      "color": "green",
      "brgy": " This area of San Bernardo,Tiwi, Albay Purok 6 is not safe"  
    }
  ],[
    [{
      "lat":   13.433785778765273,
      "lng":   123.6482048034668
    }, { 
      "lat":  13.430529947766718,
      "lng":  123.64700317382812
     
    }, {
      "lat":   13.42785846369277,
      "lng":  123.64974975585938
      
    },
  {   "lat":   13.43295095451651,
      "lng":  123.65155220031738
      
    },
  {   "lat":  13.433785778765273,
      "lng":  123.6482048034668
      
    }], {
      "color": "red",
      "brgy": " This area of San Bernardo,Tiwi, Albay Purok 5 is not safe"  
    }
  ],[
    [{
      "lat":    13.466425127537216,
      "lng":   123.65138053894042
    }, { 
      "lat":  13.459914308240803,
      "lng":  123.64932060241698
     
    }, {
      "lat":   13.457910943596932,
      "lng":  123.65558624267578
      
    },
  {   "lat":   13.46308626797232,
      "lng":  123.65833282470703
      
    },
  {   "lat":  13.466425127537216,
      "lng":  123.65138053894042
      
    }], {
      "color": "yellow",
      "brgy": " This area between Biyong and Cale,Tiwi, Albay  is not safe"  
    }
  ],[
    [{
      "lat":    13.453737213419249,
      "lng":    123.64726066589354
    }, { 
      "lat":   13.447059093856021,
      "lng":  123.64623069763184
     
    }, {
      "lat":   13.445806925715525,
      "lng":  123.6573886871338
      
    },
  {   "lat":   13.453737213419249,
      "lng":  123.64726066589354
      
    }], {
      "color": "yellow",
      "brgy": " This area between Biyong and Bagumbayan,Tiwi, Albay  is not safe"  
    }
  ],[
    [{
      "lat":    13.476608361409442,
      "lng":   123.67077827453613
    }, { 
      "lat":   13.46917965160469,
      "lng": 123.66949081420898
     
    }, {
      "lat":  13.465673888196857,
      "lng":  123.68167877197267
      
    },
  {   "lat":   13.476775296057172,
      "lng":  123.67352485656738
      
    }, { 
      "lat":  13.476608361409442,
      "lng":  123.67077827453613
     
    }], {
      "color": "green",
      "brgy": " This area between Cararayan,Bolo and Putsan,Tiwi, Albay  is not safe"  
    }
  ],[
    [{
      "lat":    13.464004458996566,
      "lng":   123.6283779144287
    }, { 
      "lat":   13.45231812858888,
      "lng": 123.62674713134766
     
    }, {
      "lat":  13.450815559016652,
      "lng":  123.63584518432617
      
    },
  {   "lat":   13.454488490219644,
      "lng":  123.64013671874999
      
    }, { 
      "lat":  13.464004458996566,
      "lng":  123.6283779144287
     
    }], {
      "color": "yellow",
      "brgy": " This area between Cararayan,Bolo and Putsan,Tiwi, Albay  is not safe"  
    }
  ],[
    [{
      "lat":   13.461166402629834,
      "lng":   123.68356704711913
    }, { 
      "lat":   13.45457196527421,
      "lng":  123.68459701538086
     
    }, {
      "lat":  13.453486787295418,
      "lng":    123.68974685668945
      
    },
  {   "lat":   13.461166402629834,
      "lng": 123.68356704711913
      
    }], {
      "color": "green",
      "brgy": " This area between Gajo and Baybay,Tiwi, Albay  is not safe"  
    }
  ],[
    [{
      "lat":   13.457159677533681,
      "lng":   123.67721557617188
    }, { 
      "lat":   13.455323239456018,
      "lng":  123.67618560791014
     
    }, {
      "lat":  13.454905865201528,
      "lng":    123.68013381958006
      
    },
  {   "lat":   13.457159677533681,
      "lng": 123.67721557617188
      
    }], {
      "color": "yellow",
      "brgy": " This area of Tigbi,Tiwi, Albay Purok 8a is not safe"  
    }
  ]
  
];


  for (var i = 0; i < PolyBarangays.length; i++) {
    var bounds = new google.maps.LatLngBounds();

    var poly = new google.maps.Polygon({
      fillColor: PolyBarangays[i][1].color,
      strokeWeight: 0.5,
      path: PolyBarangays[i][0],
      map: map
    });

    for (var pathidx = 0; pathidx < poly.getPath().getLength(); pathidx++) {
      bounds.extend(poly.getPath().getAt(pathidx));
    }
    // store the computed center as a property of the polygon for easy access
    poly.center = bounds.getCenter();
    var infowindow = new google.maps.InfoWindow();
    var title = PolyBarangays[i][1].brgy;
    // use function closure to associate the infowindow with the polygon
    poly.addListener('click', (function(content) {
        return function() {
          // set the content
          infowindow.setContent(content);
          // set the position
          infowindow.setPosition(this.center);
          // open it
          infowindow.open(map);
        }
      })(PolyBarangays[i][1].brgy));
    };

     var iconBase = 'images/';
        var icons = {
         
          Gymnasium: {
            name: 'Gymnasium',
            icon: iconBase + 'communitycentre.png'
          },
          School: {
            name: 'School',
            icon: iconBase + 'bighouse.png'
          },
         
        };
 var legend = document.getElementById('legend');
        for (var key in icons) {
          
          var type = icons[key];

          var name = type.name;
          var icon = type.icon;
          var div = document.createElement('div');
          div.innerHTML = '<br><img src="' + icon + '"> ' + name;
          legend.appendChild(div);
        }

        map.controls[google.maps.ControlPosition.RIGHT_TOP].push(legend);
   
        
		 map.mapTypes.set('styled_map', styledMapType);
        map.setMapTypeId('styled_map');
       
     var callD = JSON.parse(document.getElementById('data').innerHTML);
       geocoder = new google.maps.Geocoder();
       codeAddress(callD);
       

       var allData = JSON.parse(document.getElementById('allData').innerHTML);
       showAllEvac(allData);
      

      var allDatas = JSON.parse(document.getElementById('allDatas').innerHTML);
       showssAllEvac(allDatas);
      console.log(allDatas);
      }
      
function showAllEvac(allData){

     var iconBase = 'images/';
        var icons = {
         
          Gymnasium: {
            name: 'Gymnasium',
            icon: iconBase + 'communitycentre.png'
          },
          School: {
            name: 'School',
            icon: iconBase + 'bighouse.png'
          },
         
        }; 
        
  var infowin = new google.maps.InfoWindow;
  Array.prototype.forEach.call(allData, function(data){
    var content = document.createElement('div');
    var strong = document.createElement('strong');
    strong.textContent = data.Area_name;

    content.appendChild(strong);
    var marker = new google.maps.Marker({
      position: new google.maps.LatLng(data.Lattitude,data.Longitude),
      icon:icons[data.EvacType].icon,
      map:map
    });
    marker.addListener('click',function(){
      infowin.setContent(content);
      infowin.open(map,marker);
    })
  })
}





  function codeAddress(callD) {
    Array.prototype.forEach.call(callD, function(data){
      var address= data.Area_name + ' ' + data.address;
geocoder.geocode({'address': address}, function(results, status) {
  if (status == 'OK') {
    map.setCenter(results[0].geometry.location);
    var dta = {};
    dta.ec_id= data.ec_id;
    dta.lat=map.getCenter().lat();
    dta.long=map.getCenter().lng();
    updateEvacLatLong(dta);
  } else {
    window.alert('Geocode was not successful for the following reason: ' + status);
  }
});
});
}

function updateEvacLatLong(dta){
  $.ajax({
    url:"update1.php",
    method:"post",
    data:dta,
    success: function(results){
      console.log(results);
    }

  })
  
}
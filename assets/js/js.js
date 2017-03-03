		function randString() {
			var T=[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17];
			for(var i=T.length-1; i>=1; i--){
				//j reçoit un nombre entier aléatoire entre 0 et i
				var j = Math.floor(Math.random()*(i+1));

				var tmp = T[i];
				T[i] = T[j];
				T[j] = tmp;
			}
	        return T;
	    }

		function constructHeader(){
			if(1){ /*si c'est la page accueil alors on construit la zone de portraits */
				var order = randString();
				console.log(order);

				var elem = document.getElementById('zoneSpeHome');
				var html = '<div id="zoneFlex404">';
				var i = 0;
				for (i = 0; i < 10; i++) {
						html += '<div class="carte"><a href="#"><img src="assets/images/promo404-'+ order[i] +'.png"></a></div>';
				}
				html += '<div class="carteFixe"><img src="assets/images/logo/404.png"></div>';
				for (i = 10; i < 17; i++) {
					if(i==10) {
						html += '<div class="carteFixe">';
					}
					else{
						html += '<div class="carte">'
					}

					html += '<a href="#"><img src="assets/images/promo404-'+ order[i] +'.png"></a></div>';

				}
				html += '</div>';
				elem.innerHTML = html;
			}
		}

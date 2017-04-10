
// Importer la class Component
import { Component, OnInit } from '@angular/core';

// Importer la class router
import { Router } from '@angular/router';

//  definir le décorateur @component({.....})
@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent implements OnInit{ 
  
  // Initier le router dans le constructor du composant
  constructor(
    private router: Router
  ){}

  private burgerIsOpen = false;

  // Créer une fonction à appeler au click sur fa bars
  openBurger(){

    if( this.burgerIsOpen == false ){
        
        // Changer la valeur de burgerIsOpen 
         this.burgerIsOpen = true;
    }else{
      
        // Changer la valeur de burgerIsOpen 
        this.burgerIsOpen = false;

    };
   
  };

  // Créer une fonction pour fermer le burger menu
  closeBurger(link){

      // fermer le burger menu 
      this.burgerIsOpen = false

      //  Naviguer vers la bonne vue
      this.router.navigate([link]);
  }

  //  Attendre le chargement du composant 
  ngOnInit(){
    
    console.log('le composant est ok')
    
    // Créer une variable pour séléctionner le loader en JS
    let loader = document.getElementById('appLoader');

    // Ajouter la class closeLoader à la balise
    loader.classList.add('closedLoader');
  }

}

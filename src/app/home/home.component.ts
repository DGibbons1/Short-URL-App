import { Component, OnInit } from '@angular/core';
// Import API Service
import { ApiService } from '../services/api-service';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent {

  // Variable to hold short URL returned from DB
  public shortURL = '';
  public fullURL = '';

  constructor(private apiService: ApiService) { }

  public clickSubmitBtn() {
    if (this.fullURL !== 'Paste URL Here' && this.fullURL.length > 0) {
      this.apiService.postURL(this.fullURL).subscribe(data => {
        this.shortURL = data['shortURL'];
      }
    );
    } else {
      alert('Enter a valid URL');
    }
  }

}

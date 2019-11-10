import { Component } from '@angular/core';
// Import API Service
import { ApiService } from './services/api-service';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'ShortUrlApp';

  // Variable to hold short URL returned from DB
  public shortURL = '';
  public fullURL = 'Paste URL Here';

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

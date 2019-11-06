import { Component } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'ShortUrlApp';

  // Variable to hold short URL returned from DB
  public shortURL = 'Placeholder';

}

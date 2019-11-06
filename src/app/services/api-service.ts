import { Injectable } from '@angular/core';
import { Http } from '@angular/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class ServerActionService {

  // Base URL for API calls
  public apiBaseURL = 'http://localhost/ShortUrlApp/api/';

  constructor(public http: Http) { }

  postURL(baseURL: string): Observable<any> {
    return  this.http.post(this.apiBaseURL + 'url/create.php',
    {
      'base_url': baseURL
    });
  }
}

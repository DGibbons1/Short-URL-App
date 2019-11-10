import { Injectable } from '@angular/core';
import { Http } from '@angular/http';
import { Observable } from 'rxjs';
import { map } from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})
export class ApiService {

  // Base URL for API calls
  public apiBaseURL = "http://localhost/ShortUrlApp/api/";

  constructor(public http: Http) { }

  // Query the DB to insert a new line into the table
  public postURL(baseURL: string): Observable<any> {
    return  this.http.get(this.apiBaseURL + "url/create.php?base_url="+baseURL).pipe(map(obs => obs.json()));
  }


  // Query the DB to get the value for the base URL
  public getBaseUrl(shortUrl: string): Observable<any> {
    return  this.http.get(this.apiBaseURL + "url/getbase.php?short_url="+shortUrl).pipe(map(obs => obs.json()));
  }

}

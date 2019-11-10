import { Component, OnInit } from '@angular/core';
import { ApiService } from '../services/api-service';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-redirect',
  templateUrl: './redirect.component.html',
  styleUrls: ['./redirect.component.css']
})
export class RedirectComponent implements OnInit {

  public slug: string = '';
  private origURL: string = '';

  constructor(private apiService: ApiService, private route: ActivatedRoute) { }

  ngOnInit() {
    this.slug = this.route.snapshot.params.id;
    this.getBaseUrl(this.slug);
  }

  // Method to get original url from DB
  private getBaseUrl(slug: string) {
    this.apiService.getBaseUrl(slug).subscribe(data => {
      this.origURL = data[0]['base_url'];
      window.location.href = 'http://' + this.origURL;
    }
  );
  }

}

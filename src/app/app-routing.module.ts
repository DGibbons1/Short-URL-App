import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

// Import each Component required for routing
import { HomeComponent } from './home/home.component';
import { RedirectComponent } from './redirect/redirect.component';

// Declare routes
const routes: Routes = [
  { path: 'home',  component: HomeComponent },
  { path: 'url/:id', component: RedirectComponent },
  {
    path: '',
    redirectTo: '/home',
    pathMatch: 'full'
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
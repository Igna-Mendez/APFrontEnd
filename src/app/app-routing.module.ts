import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { AboutComponent } from './components/about/about.component';
import { ExpComponent } from './components/exp/exp.component';
import { ProjectsComponent } from './components/projects/projects.component';
import { RegisterComponent } from './components/register/register.component';
import { SigninComponent } from './components/signin/signin.component';
import { StudiesComponent } from './components/studies/studies.component';

const routes: Routes = [
 /*  { path: '', pathMatch: 'full', redirectTo: 'signin' }, */
  { path: 'signin', component: SigninComponent },
  { path: 'register', component: RegisterComponent },
  { path: 'Exp', component : ExpComponent},
  { path: 'Projects', component : ProjectsComponent },
  { path: 'Studies', component : StudiesComponent },
  { path: 'About', component : AboutComponent }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }

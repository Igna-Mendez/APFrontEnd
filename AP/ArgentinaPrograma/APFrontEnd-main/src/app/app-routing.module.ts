import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { SigninComponent } from './components/signin/signin.component';
import { RegisterComponent } from './components/register/register.component';
import { ExperienciaComponent } from './experiencia/experiencia.component';
import { ProyectosComponent } from './proyectos/proyectos.component';
import { FormacionComponent } from './formacion/formacion.component';
import { AboutComponent } from './about/about.component';

const routes: Routes = [
 /*  { path: '', pathMatch: 'full', redirectTo: 'signin' }, */
  { path: 'signin', component: SigninComponent },
  { path: 'register', component: RegisterComponent },
  { path: 'Experience', component : ExperienciaComponent},
  { path: 'Proyects', component : ProyectosComponent },
  { path: 'Education', component : FormacionComponent },
  { path: 'About', component : AboutComponent }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }

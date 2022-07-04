import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HeaderComponent } from './header/header.component';

import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { SigninComponent } from './components/signin/signin.component';
import { RegisterComponent } from './components/register/register.component';
import { AngularMaterialModule } from './angular-material-module';
import { CUSTOM_ELEMENTS_SCHEMA } from '@angular/core';
import { FlexLayoutModule } from '@angular/flex-layout';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { MatButtonModule } from '@angular/material/button';
import { MatDialogModule } from '@angular/material/dialog';
import { FontAwesomeModule } from '@fortawesome/angular-fontawesome';
import { faLinkedin } from '@fortawesome/free-brands-svg-icons';
import { faGit } from '@fortawesome/free-brands-svg-icons';

@NgModule({
    declarations: [
        AppComponent,
        HeaderComponent,
        SigninComponent,
        RegisterComponent,
    ],
    imports: [
        BrowserModule,
        AppRoutingModule,
        MatDialogModule,
        BrowserAnimationsModule,
        AngularMaterialModule,
        FlexLayoutModule, FormsModule, ReactiveFormsModule, MatButtonModule, FontAwesomeModule,
    ],
    providers: [],
    bootstrap: [AppComponent],
    schemas: [CUSTOM_ELEMENTS_SCHEMA]
})
export class AppModule { }

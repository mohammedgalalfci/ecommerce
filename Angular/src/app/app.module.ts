import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { RouterModule } from '@angular/router';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HeaderComponent } from './header/header.component';
import { FooterComponent } from './footer/footer.component';
import { HomeComponent } from './home/home.component';

import { WomenComponent } from './women/women.component';
import { KidsComponent } from './kids/kids.component';
import { AboutComponent } from './about/about.component';
import { ContactsUsComponent } from './contacts-us/contacts-us.component';

import { AcountComponent } from './acount/acount.component';
import { MainhomeComponent } from './mainhome/mainhome.component';

@NgModule({
  declarations: [
    AppComponent,
    HeaderComponent,
    FooterComponent,
    HomeComponent,
    WomenComponent,
    KidsComponent,
    AboutComponent,
    ContactsUsComponent,
    AcountComponent,
    MainhomeComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }

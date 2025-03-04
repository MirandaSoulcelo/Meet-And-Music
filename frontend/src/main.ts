import { bootstrapApplication } from '@angular/platform-browser';
import { provideHttpClient } from '@angular/common/http';
import { AppComponent } from './app/app.component';
import { importProvidersFrom } from '@angular/core';
import { provideRouter } from '@angular/router';
import { routes } from './app/app.routes'; // Importação das rotas

bootstrapApplication(AppComponent, {
  providers: [
    provideHttpClient(), // Habilita o cliente HTTP
    provideRouter(routes) // Ativando as rotas
  ]
}).catch(err => console.error(err));

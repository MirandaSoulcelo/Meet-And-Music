import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { HttpHeaders } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class UserService {

  private apiUrl = 'http://127.0.0.1:8000/api/users'; // URL da sua API

  constructor(private http: HttpClient) { }

  // Função para criar um usuário
  createUser(user: any): Observable<any> {
    return this.http.post(this.apiUrl, user);
  }

  submitForm(userData: any) {
    const csrfToken = this.getCookie('XSRF-TOKEN') || ''; // Obtendo o token CSRF do cookie

    const headers = new HttpHeaders({
      'X-XSRF-TOKEN': csrfToken  // Incluindo o CSRF token no cabeçalho
    });

    this.http.post('http://127.0.0.1:8000/api/users', userData, { headers })
      .subscribe(
        response => {
          console.log('User created:', response);
        },
        error => {
          console.error('There was an error!', error);
        }
      );
  }

  // Função para obter o valor de um cookie
  private getCookie(name: string): string | null {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop()?.split(';').shift() || null;
    return null;
  }
}

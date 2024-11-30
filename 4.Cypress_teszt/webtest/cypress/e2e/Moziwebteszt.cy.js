describe('RTT beadando laravel docker project tesztelése', () => {
  Cypress.on('uncaught:exception', (err) => {
    if (err.message.includes('mdb is not defined') || err.message.includes('bootstrap is not defined')) {
      return false; // nemm áll meg 
    }

    if (err.message.includes("Cannot read properties of undefined")) {
      return false; // nemm áll meg 
    }

    return true; // meg áll
  });

  it('allows a user to register successfully and add movies with file upload', () => {
    // 1. Nyisd meg a főoldalt
    cy.visit('http://localhost:8000');

    // 2. Regisztrációs oldal
    cy.visit('http://localhost:8000/register');

    // 3. From kitöltése
    cy.get('input[name="name"]').type('Teszt Felhasználó12'); 
    cy.get('input[name="email"]').type('tesztfelhasznalo12@example.com'); 
    cy.get('input[name="password"]').type('TesztJelszo1234!'); 
    cy.get('input[name="password_confirmation"]').type('TesztJelszo1234!'); 
    cy.get('input[type="checkbox"]').check();
    cy.get('button[type="submit"]').click();

    // 4. Ellenőrizzés
    cy.url().should('not.include', '/register'); 

    // 5 film hozzáadása regisztrált felhasználóként
    cy.visit('http://localhost:8000/movies/create');

    cy.get('input[name="title"]').type('A Gyűrűk ura: A gyűrű szövetsége');
    cy.get('textarea[name="description"]').type('Gyyűrűk ura leriasa ');
    cy.get('input[name="duration"]').type('300');

    const fileName = 'movie1.jpg'; 
    cy.get('input[name="moviePicture"]').attachFile(fileName); 
    
    cy.get('button[type="submit"]').click();
     
    cy.visit('http://localhost:8000');
 
    // 6. Újra film hozzáadása regisztrált felhasználóként
    cy.visit('http://localhost:8000/movies/create');
    cy.get('input[name="title"]').type('Hatalom Gyűrűi');
    cy.get('textarea[name="description"]').type('Hatalom gyűrűi tesztelés');
    cy.get('input[name="duration"]').type('1000');
    const fileName2 = 'movie2.jpg';
    cy.get('input[name="moviePicture"]').attachFile(fileName2); 
    
    cy.get('button[type="submit"]').click();
 
    // 8. Lépj a Filmek listájára
    cy.visit('http://localhost:8000/movies');
    // irány a főoldal    
    cy.url().should('include', '/');
    cy.visit('http://localhost:8000');

  });
});

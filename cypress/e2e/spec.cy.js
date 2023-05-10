describe('Home Tests', () => {
  it('About test message', () => {
    cy.visit('http://127.0.0.1:8000/');
    cy.get('a').contains('About').click();
    cy.url().should('include', '/contact');
    cy.get('h2').should('contain', 'About us');
  });
});

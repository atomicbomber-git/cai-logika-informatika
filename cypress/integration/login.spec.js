beforeEach(() => {
   cy.exec("php artisan migrate:fresh --env=acceptance")
});

it('Dapat Mengakses Halaman Log In', () => {
    cy.visit("/login");
    cy.get("html").should("contain", "Log In");
    cy.screenshot();
});

it('Error Ketika User Menginput Identitas Salah Saat Log In', () => {
    cy.visit("/login");
    cy.get("[data-cy=nip_field]").type("123456");
    cy.get("[data-cy=password_field]").type("123456").focus();
    cy.get("[data-cy=login_button]").click();

    cy.get("html").should("contain", "Identitas tersebut tidak cocok dengan data kami.");
    cy.screenshot()
});

it('Redirect ke Halaman Materi Ketika User Menginput Identitas Benar Saat Login', () => {


    // cy.exec("php artisan db:seed --class=AdminUserSeeder --env=acceptance")
    //
    // cy.visit("/login");
    // cy.get("[data-cy=nip_field]").type("123456");
    // cy.get("[data-cy=password_field]").type("123456").focus();
    // cy.get("[data-cy=login_button]").click();

});

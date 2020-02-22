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

it('Redirect ke Halaman Index Materi Ketika User Menginput Identitas Benar Saat Login', () => {
    cy.request('GET', '__testing__/factory/User', {
        nip: "1234567890",
        password: "katasandi",
    })
    .then(user => {
        cy.visit("/login");
        cy.get("[data-cy=nip_field]").type("1234567890");
        cy.get("[data-cy=password_field]").type("katasandi");
        cy.get("[data-cy=login_button]").click();
        cy.url().should("include", "/materi");
    })
});

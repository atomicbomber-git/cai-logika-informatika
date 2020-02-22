it("Menambahkan Materi Baru", () => {
   cy.request("__testing__/login")
       .then(response => {
           cy.visit("/materi/create");
           cy.get("[data-cy=judul_field]").type("Judul Materi");
           cy.get("[data-cy=deskripsi_field]").type("Deskripsi Materi");
           cy.get("[data-cy=submit_button]").click();

           cy.url().should("contain", "/materi");
           cy.get("html").should("contain", "Judul Materi");
           cy.get("html").should("contain", "Deskripsi Materi");
       })
});

it ("Menghapus Materi yang Telah Ada", () => {
    cy.request("__testing__/factory/Materi", {
        "judul": "Judul Materi",
        "deskripsi": "Deskripsi Materi",
    }).then(() => {
        cy.request("__testing__/login")
            .then(() => {
                cy.visit("/materi");
                cy.contains("Judul Materi").parent()
                    .last()
                    .get("[data-cy=button_delete]")
                    .click()
            })
    });
});

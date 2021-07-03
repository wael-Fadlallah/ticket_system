import React, { useState, useEffect } from "react";
import MaterialTable from "material-table";
import { tableIcons } from "../icons";
import Launch from "@material-ui/icons/Launch";
import { loadJWT } from "../data/LocalStorage";

export default function Panel() {
  const [columns, setColumns] = useState([
    { title: "Name", field: "name" },
    {
      title: "Email",
      field: "user_email",
    },
    { title: "Subject", field: "subject" },
  ]);

  const [data, setData] = useState([]);

  useEffect(() => {
    fetch("/admin/list_tickets", {
      headers: {
        Authorization: `Bearer ${loadJWT()}`,
      },
    })
      .then((res) => res.json())
      .then((res) => setData(res));
  }, []);

  return (
    <MaterialTable
      title="Tickets"
      icons={tableIcons}
      columns={columns}
      data={data}
      editable={{
        onRowDelete: (oldData) =>
          new Promise((resolve, reject) => {
            fetch(`/admin/delete_ticket/${oldData.id}`, {
              method: "DELETE",
              headers: {
                Authorization: `Bearer ${loadJWT()}`,
              },
            })
              .then((res) => res.text())
              .then((res) => {
                const dataDelete = [...data];
                const index = oldData.tableData.id;
                dataDelete.splice(index, 1);
                setData([...dataDelete]);
                resolve();
              });
          }),
      }}
      actions={[
        {
          icon: () => {
            return <Launch />;
          },
          tooltip: "view ticket",
          onClick: (event, rowData) => {
            window.location.href = `/ticket/${rowData.urlIdentifier}`;
          },
        },
      ]}
    />
  );
}

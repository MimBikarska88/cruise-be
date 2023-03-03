import { useMemo } from "react";
import { useTable, useGlobalFilter, useRowSelect } from "react-table";
import Button from "../Button/Button";
import Checkbox from "../CheckBox/CheckBox";
import GlobalFilter from "../GlobalFilter/GlobalFilter";
import TableList from "./TableList";
import styles from "./Table.module.css";
const Table = (props) => {
  const {
    cols,
    data,
    title,
    displayFields,
    displayRows,
    setDisplayRows,
    delimeter,
  } = props;

  const tableColumns = useMemo(() => cols, []);
  const tableData = useMemo(() => data, []);

  const tableInstance = useTable(
    {
      columns: tableColumns,
      data: tableData,
    },
    useGlobalFilter,
    useRowSelect,
    (hooks) => {
      hooks.visibleColumns.push((tableColumns) => {
        return [
          {
            id: "selection",
            Header: ({ getToggleAllRowsSelectedProps }) => (
              <Checkbox {...getToggleAllRowsSelectedProps()} />
            ),
            Cell: ({ row }) => (
              <Checkbox {...row.getToggleRowSelectedProps()} />
            ),
          },
          ...tableColumns,
        ];
      });
    }
  );

  const {
    getTableProps,
    getTableBodyProps,
    headerGroups,
    rows,
    prepareRow,
    state,
    setGlobalFilter,
    selectedFlatRows,
  } = tableInstance;

  const { globalFilter } = state;

  return (
    <>
      <h4 className="text-center mt-3 mb-3">{title}</h4>
      <div className="d-grid">
        <div className="row">
          <div className="col">
            <TableList
              displayRows={displayRows}
              displayFields={displayFields}
              title={title}
              delimeter={delimeter}
            />
          </div>
          <div className="col">
            <div className={`${styles.tableFrame}`}>
              <GlobalFilter
                filter={globalFilter}
                setFilter={setGlobalFilter}
              ></GlobalFilter>
              <table
                {...getTableProps()}
                className={`table table-bordered ${styles.table}`}
              >
                <thead>
                  {headerGroups.map((headerGroup) => (
                    <tr {...headerGroup.getHeaderGroupProps()}>
                      {headerGroup.headers.map((column) => (
                        <th {...column.getHeaderProps()}>
                          {column.render("Header")}
                        </th>
                      ))}
                    </tr>
                  ))}
                </thead>
                <tbody {...getTableBodyProps()}>
                  {rows.map((row) => {
                    prepareRow(row);
                    return (
                      <tr {...row.getRowProps()}>
                        {row.cells.map((cell) => {
                          return (
                            <td {...cell.getCellProps()}>
                              {cell.render("Cell")}
                            </td>
                          );
                        })}
                      </tr>
                    );
                  })}
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div className="d-block mt-3">
        <Button
          className="d-block m-auto mt-2 mb-2"
          value="Save"
          onClick={() => setDisplayRows(selectedFlatRows)}
        ></Button>
      </div>
    </>
  );
};
export default Table;

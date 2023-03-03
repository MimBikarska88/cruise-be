import styles from "./SimpleTable.module.css";
const SimpleTable = (props) => {
  const { headers, data = [] } = props;

  return (
    <>
      <table className="table table-bordered table-responsive">
        <thead>
          <tr>
            {headers.map((col, i) => (
              <th key={i}>{col}</th>
            ))}
          </tr>
        </thead>
        <tbody>
          {data.map((row, i) => (
            <tr key={i}>
              {row.map((cell, i) => {
                return <td key={i}>{cell}</td>;
              })}
            </tr>
          ))}
        </tbody>
      </table>
    </>
  );
};
export default SimpleTable;

import { CustomHead } from "../../components/CustomHead";
import { Form } from "../../components/form/Form";
import { Layout } from "../../components/Layout";
import { Location } from "../../components/location/Location";

export default function AboutPage() {
  return (
    <>
      <CustomHead title={"Alpha motors | Vehicle inner page"} />
      <Layout>
        <Location
          parent={{ text: "Cars", url: "/vehicles" }}
          title="Inner page"
          location="Inner page"
        />
        <Form />
      </Layout>
    </>
  );
}
